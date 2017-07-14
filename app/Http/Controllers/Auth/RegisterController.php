<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Jobs\ProcessRegistration;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|min:9|max:12|unique:users',
            'dob' => 'required|date',
            'identification' => 'required|string|max:10|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data = null)
    {
        return User::create([
            'user_uuid' => str_random(10),
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'phone' => '254'. substr($data['phone'], -9),
            'dob' => $data['dob'],
            'identification' => $data['identification'],
            'password' => bcrypt($data['password']),
            'api_token' => base64_encode($data['email']),
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        dispatch(new ProcessRegistration($user));

        return redirect('auth/awaiting-verification');
    }

    /**
     * The page displays their confirmation status.
     *
     * @return \Illuminate\Http\Response
     **/
    public function awaitingConfirmation()
    {
        return view('auth.verify');
    }

    /**
    * Handle a registration request for the application.
    *
    * @param $token
    * @return \Illuminate\Http\Response
    */
    public function verify(Request $request, $token)
    {
        // Check if the user exists.
        $user = User::where('api_token', $token)->first();

        // Set the user to active, reinstance their api token and their role to customer.
        $user->is_active = true;
        $user->api_token = base64_encode($user->email . $user->password);

        // Save the user model.
        $user->save();

        // Login the user.
        $this->guard()->login($user);

        // Redirect the user to the home page.
        return $this->registered($request, $user)
                    ?: redirect($this->redirectPath());
    }
}
