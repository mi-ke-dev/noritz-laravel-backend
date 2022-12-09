<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the o365 authentication page.
     *
     * References to env('GRAPH_TENANT_ID') can be changed to
     * config('services.graph.tenant_id') which bypasses the Laravel
     * config cache.
     *
     * See https://github.com/SocialiteProviders/Providers/issues/337
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('azure')->redirect();
    }

    /**
     * Obtain the user information from o365.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('graph')
            ->setTenantId(env('GRAPH_TENANT_ID'))
            ->user();

        echo 'Looks like we got there as ' . $user->email;

    }
}
