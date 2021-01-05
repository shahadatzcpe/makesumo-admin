<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    private function findUser($provider, $userId)
    {
        return User::where('google_id', $userId)->first();
    }

    private function getDuplicateAccount($provider, $socialuser) {
        return User::where('email', $socialuser->getEmail())->first();
    }

    private function registerUser($provider, \Laravel\Socialite\Contracts\User $socialuser)
    {
        if($user = $this->getDuplicateAccount($provider, $socialuser)) {
           $user->google_id = $socialuser->getId();
           $user->save();
        } else {
            $user = User::create([
                'name' => $socialuser->getName(),
                'email' => $socialuser->getEmail(),
                'google_id'=> $socialuser->getId(),
                'password' => bcrypt(time() . $socialuser->getId())
            ]);
        }

        return $user;
    }

    public function handleCallback($provider)
    {
        try{
            $socialUser = Socialite::driver($provider)->user();
            $user = $this->findUser($provider, $socialUser->id);

            if(!$user) {
                $user = $this->registerUser($provider, $socialUser);
            }
            Auth::login($user);

            return redirect('/');

        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect("auth/{$provider}");
        }
    }
}
