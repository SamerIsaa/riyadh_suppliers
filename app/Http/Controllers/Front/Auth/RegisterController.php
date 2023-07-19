<?php

namespace App\Http\Controllers\Front\Auth;

use App\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm()
    {
        return view('front.auth.register');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'company_name' => ['required', 'string', 'max:255'],
            'owner_name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255', 'unique:users,mobile'],
            'commercial_registration_no' => ['required', 'string', 'max:255'],
            'tax_no' => ['required', 'string', 'max:255'],
            'order_owner_name' => ['required', 'string', 'max:255'],
            'order_owner_mobile' => ['required', 'string', 'max:255', 'unique:users,order_owner_mobile'],
            'address' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
        ], [], [
            'company_name' => __('constants.company_name'),
            'owner_name' => __('constants.owner_name'),
            'mobile' => __('constants.mobile'),
            'commercial_registration_no' => __('constants.commercial_registration_no'),
            'tax_no' => __('constants.tax_no'),
            'order_owner_name' => __('constants.order_owner_name'),
            'order_owner_mobile' => __('constants.order_owner_mobile'),
            'address' => __('constants.address'),
        ]);
    }

    protected function create(array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        return User::query()->create($data);
    }


    public function register(Request $request)
    {
        reArrangeTeleinputData($request);
        reArrangeOwnerTeleinputData($request);
        $this->validator($request->all())->validate();

        $data = $request->all();
        $data['order_owner_country_code'] = 'sa';
        $data['mobile_country_code'] = 'sa';

        event(new Registered($user = $this->create($data)));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: $this->sendLoginResponse();
    }

    protected function sendLoginResponse()
    {
        return response()->json([
            'status' => true,
            'message' => __('messages.done_successfully'),
            'redirectUrl' => url($this->redirectTo)
        ]);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
