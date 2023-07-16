<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; //Para encriptar contraseña. No se necesita instalar nada
use Illuminate\Support\Facades\Auth;

/*
- El facade Auth permite realizar acciones relacionadas con la autenticación, como autenticar usuarios,
verificar credenciales, verificar si un usuario está autenticado, obtener el usuario autenticado actualmente y más.

- Al importar 'Auth' utilizando la declaración 'use', puedes acceder a los métodos y propiedades proporcionados
por el facade Auth en el contexto actual. Por ejemplo, puedes utilizar 'Auth::attempt()' para intentar
autenticar a un usuario con las credenciales proporcionadas, o 'Auth::user()' para obtener el usuario autenticado
actualmente.
*/

use App\Http\Requests\LoginFormRequest; //El request personalizado

class UserController extends Controller
{

    public function index()
    {
        return User::where('state', 1)->get();
    }


    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password); //Encriptar contraseña
        $user->save();
        return $user;
    }


    public function show(User $user)
    {
        return $user; //Retorna los registros con 'state=1'
    }


    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;

        if(isset($request->password)) {
            if(!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }
        }

        $user->save();
        return $user;
    }


    public function destroy(User $user)
    {
        $user->state = 0;
        $user->save();
        return $user;
    }

    //Haciendo uso del Request personalizado
    public function login(LoginFormRequest $request, User $user)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], false)()) {
            $user = Auth::user();
            return $user;
        } else {
            return response()->json(['error' => ['login' => ['Datos no válidos']]]);
        }
    }

    /*
    - Auth::attempt() se utiliza para intentar autenticar al usuario utilizando las credenciales proporcionadas
    en $request->email y $request->password. Esta función verifica si las credenciales son válidas y, si es así,
    inicia la sesión del usuario.

    - Si Auth::attempt() devuelve true, significa que la autenticación fue exitosa y el usuario está ahora autenticado.
    En este caso, se obtiene el usuario autenticado actualmente utilizando Auth::user() y se devuelve como respuesta.

    - Si Auth::attempt() devuelve false, significa que la autenticación falló y las credenciales proporcionadas
    no son válidas. En este caso, se devuelve una respuesta JSON con un mensaje de error indicando que los datos
    no son válidos.

    '''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

    - El método attempt() de Auth en Laravel tiene la siguiente firma:

        public function attempt(array $credentials = [], $remember = false)


    - El segundo argumento $remember es opcional y determina si se debe realizar el inicio de sesión "recuerdame"
    para el usuario autenticado. Si se establece como true, el usuario se mantendrá autenticado incluso después de
    cerrar el navegador, utilizando una cookie de "recuerdame".

    - En tu caso, al pasar false como segundo argumento, estás indicando que no se debe realizar el inicio de sesión
    "recuerdame". Esto significa que el usuario se mantendrá autenticado solo durante la sesión actual y
    se cerrará automáticamente al cerrar el navegador o expirar la sesión.
    */
}
