<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate_login($request);

        $result = Auth::attempt($this->parse_login_data($request));

        if ($result){
            return redirect()->route('panel');
        }else{
            return back()->withErrors(__('messages.invalid_login_credential'))->withInput($request->only('username'));
        }
    }

    private function parse_login_data(Request $request){
        $data = [
            'password' => $request->get('password')
        ];

        if (filter_var($request->get('username'), FILTER_VALIDATE_EMAIL)){
            $data['email'] = $request->get('username');
        }else{
            $data['username'] = $request->get('username');
        }

        return $data;
    }

    private function validate_login(Request $request)
    {
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
}
