<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Usuario;
use App\Models\Normal;
use App\Models\Editor;
use App\Models\Administrador;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:usuarios'],
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $tipoUsuario = $data['tipoUsuario'];

        $user = Usuario::create([
            'username' => $data['username'],
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'fNacimiento' => $data['fNacimiento'],
            'password' => Hash::make($data['password']),
        ]);

        if($tipoUsuario == 'normal') {
            $users = Usuario::where('username', $data['username']);
            $normal = Normal::create([
                'normal_id' => $user->id,
            ]);

        } elseif($tipoUsuario == 'editor') {
            $users = Usuario::where('username', $data['username']);
            $editor = Editor::create([
                'editor_id' => $user->id,
            ]);
        } elseif($tipoUsuario == 'admin') {
            $users = Usuario::where('username', $data['username']);
            $admin = Administrador::create([
                'administrador_id' => $user->id,
            ]);
        }
        return($user);
    }
}
