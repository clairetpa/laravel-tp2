<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Hash;
use Illuminate\Support\Facades\Hash;
// use Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Etudiant;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20',
        ]);

        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        // return redirect('login');
        // return redirect()->back()->withSuccess('User enregistré');
        return redirect(route('login'))->withSuccess('User enregistré');
    }


    public function authentication(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ]);

        $credentials = $request->only('email', 'password');

        if(!Auth::validate($credentials)) :
            return redirect('login')
                ->withErrors(trans('auth.failed')); // if there is error, it will find the 'failed' line on resources/lang/auth.php
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        $etudiant = Etudiant::find($user->id);
        session()->put('etudiant', $etudiant);

        Auth::login($user, $request->get('remember'));

        return redirect()->intended('index')->withSuccess('Signed in');
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect(route('etudiant.index'));
    }
}
