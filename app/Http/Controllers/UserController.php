<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function update(User $user)
    {
        $attributes = $this->validateUser($user);

        $findUser = User::find($attributes["id"]);

        if($findUser){
            $result = User::where('id', $attributes["id"])->update(['name' => $attributes["name"], 'email' => $attributes["email"]]);

            //var_dump($result);
        }
    
        return redirect('/');
    }

    public function destroy(){
        $id = request()->id;
        User::where('id', $id)->delete();
        return redirect('/login');
    }

    protected function validateUser(?User $user = null): array
    {
        $user ??= new User();

        return request()->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required'
        ]);

    }
}
