<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Social_Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;


class UserController extends Controller
{

    /**
     * $user -> recibe el modelo user, el cual contiene todos los atributos.
     */
    public function update(User $user)
    {
        $attributes = $this->validateUser($user);
        if(User::find($attributes["id"])){
            User::where('id', $attributes["id"])->update(['name' => $attributes["name"], 'email' => $attributes["email"]]);
        }

        session()->flash('success','The account has been updated');
        return redirect('/');
    }

    /**
     * Eliminar una cuenta permanente.
     */
    public function destroy(){
        $id = request()->id;
        User::where('id', $id)->delete();
        session()->flash('success','The account has been deleted');
        return redirect('/login');
    }

    /**
     * Valida que los campos no esten vacios o nullos.
     */
    protected function validateUser(?User $user = null): array
    {
        $user ??= new User();

        return request()->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required'
        ]);

    }

    public static function validateAuthenticationTwitter(){
        $resultDb = Social_Profile::where('user_id', Auth::user()->id)->where('social_network_name', 'Twitter')->get();
        $validation = true;
        if(count($resultDb) < 1) {
            $validation = false;
        }

        return $validation;
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session_destroy();
    }
}
