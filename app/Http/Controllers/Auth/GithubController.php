<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    //creation deux fontions
    public function authtogit()
    {
        //envoyer une requete à github
        return Socialite::driver('github')->redirect();//redirection vers github
    }
    public function redirectfromgit()
    {
        //recevoire une requete de git
        $userInfos = Socialite::driver('github')->stateless()->user();//statless pour eviter l'erruer de  hasInvalidState()
                                                                        //hasInvalidState rutrune qulque chose de true ,on fiat appelle à stateless() pour rendre false
                                                //statless returne false
$user = User::updateOrCreate([
            'email'=>$userInfos->email //verifier avec email sionn passer à la creation
],[
                'name' => $userInfos->name,
                'role'=>User::USER_ROLE,
                'password' => Hash::make(Str::random(24))
]);

       // dd( $userInfos);
        // $user->token
        Auth::login($user);
        return redirect()->route('home');
    }
}
