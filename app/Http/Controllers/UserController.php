<?php

namespace App\Http\Controllers;
use App\Models\User;


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
}
