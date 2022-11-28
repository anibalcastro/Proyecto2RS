<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use App\Models\Social_Profile;
use Illuminate\Support\Facades\Auth;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Facades\Storage;

class TwitterController extends Controller
{

    public static function twitterAuthenticate(){

            require_once '../vendor/autoload.php';
            $config = require_once '../config.php';

            // create TwitterOAuth object
            $twitteroauth = new TwitterOAuth($config['consumer_key'], $config['consumer_secret']);

            // request token of application
            $request_token = $twitteroauth->oauth(
                'oauth/request_token', [
                    'oauth_callback' => $config['url_callback']
                ]
            );

            // throw exception if something gone wrong
            if($twitteroauth->getLastHttpCode() != 200) {
                throw new \Exception('There was a problem performing this request');
            }

            // save token of application to session
            $content = [$request_token['oauth_token'],",",$request_token['oauth_token_secret']];

            Storage::disk('local')->put('Auth.txt', implode("", $content));


            // generate the URL to make request to authorize our application
            $url = $twitteroauth->url(
                'oauth/authorize', [
                    'oauth_token' => $request_token['oauth_token']
                ]
            );

            // and redirect
            return $url;

            session()->flash('success','Error, Authentication failed');
            return redirect('/home');

    }

    public function getUserToken(){

            $contents = Storage::disk('local')->get('Auth.txt');
            $auth = explode(",", $contents);
            $oauth_token = $auth[0];
            $oauth_token_secret = $auth[1];
            Storage::delete('Auth.txt');

            $config = require_once '../config.php';
            $oauth_verifier = filter_input(INPUT_GET, 'oauth_verifier');

            if (empty($oauth_verifier) ||
                empty($oauth_token) ||
                empty($oauth_token_secret)
            ) {
                // something's missing, go and login again
                header('Location: ' . $config['url_login']);
            }

            // connect with application token
            $connection = new TwitterOAuth(
                $config['consumer_key'],
                $config['consumer_secret'],
                $oauth_token,
                $oauth_token_secret
            );

            // request user token
            $token = $connection->oauth(
                'oauth/access_token', [
                    'oauth_verifier' => $oauth_verifier
                ]
            );

            // save data in database...
            $social_profile = new Social_Profile();
            $social_profile->user_id = Auth::user()->id;
            $social_profile->user_profile_id = $token['oauth_token'];
            $social_profile->user_access_token = $token['oauth_token_secret'];
            $social_profile->social_network_name = 'twitter';

            $social_profile->save();

            session()->flash('success','The account has been linked');
            return redirect('/home');



            session()->flash('success','Error, Authentication failed');
            return redirect('/home');



    }


    public static function twitterPost($content){

        require_once '../vendor/autoload.php';
        //Implements Config
        $config = require_once '../config.php';

        //get data
        $resultDb = Social_Profile::where('user_id', Auth::user()->id)->where('social_network_name', 'twitter')->first();


        $twitter = new TwitterOAuth(
            $config['consumer_key'],
            $config['consumer_secret'],
            $resultDb->user_profile_id,
            $resultDb->user_access_token
        );
        $twitter->setTimeouts(10, 15);
        $result = $twitter->post('statuses/update', ['status'=>$content]);


        return $result;
    }
}
