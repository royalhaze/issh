<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('user_type',User::CLIENT_USER_TYPE)->paginate($request->get('per_page',20));

        return response()->json([
           'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $this->store_validate($request);

        $user = User::create_user($request->get('username'),$request->get('password'),$request->get('from_now'),$request->get('expire'),$request->get('bandwidth'),$request->get('concurrent_users'),$request->get('email'),$request->get('mobile'));

        $status = ($user instanceof User);

        return response()->json([
           'status' => $status,
           'message' => ($status)?'User created successfully':'Error while creating user'
        ]);
    }

    private function store_validate(Request $request)
    {
        $this->validate($request, [
            'username' => ['required', 'unique:users,username'],
            'password' => ['required'],
            'email' => ['nullable', 'email', 'unique:users,email'],
            'mobile' => ['nullable', 'number', 'unique:users,mobile'],
            'bandwidth' => ['required', 'numeric'],
            'concurrent_users' => ['required', 'numeric'],
            'from_now' => ['required',Rule::in(['true','false'])],
        ]);

        if ($request->get('from_now') == 'true'){
            $this->validate($request,[
               'expire' => ['required','date','after:today'],
            ]);
        }else{
            $this->validate($request,[
                'expire' => ['required','numeric'],
            ]);
        }
    }
}
