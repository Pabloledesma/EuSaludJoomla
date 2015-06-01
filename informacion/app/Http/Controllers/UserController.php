<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function index()
    {
        return view('user.index');
    }
    
    public function edit()
    {
        return Input::all();
    }
    
    public function register( Requests\Registrar_nuevo_usuario $request )
    {
        $input = $request->all();
        $user = new User();
        $user->name     = $input['name'];
        $user->email    = $input['email'];
        $user->num_id   = $input['num_id'];
        $user->user_type = $input['user_type'];
        
        //Encriptar password
        $options = [
            'cost' => 7,
            'salt' => 'BCryptRequires22Chrcts',
        ];
     
        $user->password = password_hash($input['password'], PASSWORD_BCRYPT, $options);
        $user->save();
        
        //mensaje de verificación
        
        return redirect()->to('inicio');
    }

}
