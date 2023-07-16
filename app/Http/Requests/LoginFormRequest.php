<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/*
    - php artisan make:request LoginFormRequest

    - La clase 'LoginFormRequest' contendrá métodos para definir las reglas de validación de los campos
    de un formulario de inicio de sesión, así como mensajes personalizados de error, si es necesario.
    Puedes modificar esta clase generada para agregar las reglas de validación específicas para tu formulario
    de inicio de sesión.
*/

class LoginFormRequest extends FormRequest
{
    /**
     * Determinar si el usuario está autorizado para realizar esta solicitud.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtenga las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'El correo es obligatorio',
            'password.required' => 'La contraseña es obligatoria',
        ];
    }
}


/*
- La clase LoginFormRequest es una clase de solicitud personalizada que se utiliza para validar
los datos enviados en una solicitud HTTP. Su propósito principal es validar los datos antes de que
lleguen al controlador correspondiente.

- En tu controlador, puedes utilizar el 'LoginFormRequest' especificándolo como una dependencia
en el método correspondiente. Por ejemplo:

''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
use App\Http\Requests\LoginFormRequest;

class LoginController extends Controller
{
    public function login(LoginFormRequest $request)
    {
        // La lógica de validación ya se ha realizado en el LoginFormRequest
        // Puedes acceder a los datos validados a través del objeto $request

        // Realiza la lógica de autenticación y manejo del inicio de sesión aquí
    }
}
''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

- Al especificar el LoginFormRequest como una dependencia del método login(), Laravel se encargará de
validar automáticamente la solicitud utilizando las reglas de validación definidas en la clase LoginFormRequest
antes de que el método login() se ejecute. Si los datos de la solicitud no cumplen con las reglas de validación,
Laravel generará una respuesta de error automáticamente.

- De esta manera, Laravel sabe qué controlador utilizar basándose en el enrutamiento definido en tu archivo de rutas
(routes/web.php o routes/api.php) donde se especifica la ruta y el controlador asociado.
Al agregar el LoginFormRequest como dependencia en el método de tu controlador,
Laravel sabe que debe aplicar la validación antes de ejecutar el método del controlador correspondiente.

*/
