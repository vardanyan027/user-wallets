<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\User\Actions\CreateUserAction;
use App\Services\User\Dto\CreateUserDto;
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
    protected $redirectTo = RouteServiceProvider::HOME;
    private CreateUserAction $createUserAction;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CreateUserAction $createUserAction,
    )
    {
        $this->middleware('guest')->except('logout');
        $this->createUserAction = $createUserAction;
    }

    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            $createUserDto = new CreateUserDto(
                $user->name,
                $user->email,
                'admin@123'
            );
            $newUser = $this->createUserAction->run($createUserDto);
            auth()->login($newUser, true);
        }
        return redirect()->to('/home');
    }

    public function handleProviderFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        $wallets = $existingUser->wallets;
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            $createUserDto = new CreateUserDto(
                $user->name,
                $user->email,
                'admin@123'
            );
            $newUser = $this->createUserAction->run($createUserDto);
            $wallets = [];
            auth()->login($newUser, true);
        }

        return view('home')->with('wallets', $wallets);
    }
}
