<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/profile';


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        return view('front.auth.login');
    }

    public function login(Request $request)
    {
        reArrangeTeleinputData($request);
        $validator = $this->validateLogin($request);

        if ($validator->fails()) {
            return $this->response_api(false , $validator->errors()->first() );
        }


        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    protected function validateLogin(Request $request)
    {
        $niceNames = [
            $this->username() => __('constants.mobile'),
            'password' => __('constants.password'),
        ];

        return Validator::make($request->all(), [
            $this->username() => 'required|exists:users,mobile',
            'password' => 'required|min:8'
        ], [], $niceNames);
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if (!$this->authenticated($request, $this->guard()->user())) {
            return response()->json([
                'status' => true,
                'message' => __('messages.done_successfully'),
                'redirectUrl' => url($this->redirectTo)
            ]);
        } else {
            return $this->response_api(false , __('auth.failed'));
        }
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return $this->response_api(false , __('auth.failed'));
    }


    public function username()
    {
        return 'mobile';
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }


    protected function guard()
    {
        return Auth::guard('web');
    }


}
