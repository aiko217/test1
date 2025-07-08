<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Contact;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    //

    public function showRegisterForm()
    {
        return view('auth.register');
    }
    public function register(AuthRequest $request)
{
    $user = $request->only(['name', 'email', 'password']);
    $user['password'] = bcrypt($user['password']);

    User::create($user);

    return redirect()->route('auth.login')->with('message', '登録が完了しました');
}

    public function showLoginForm()
    {
    return view('auth.login');
    }

    public function login(LoginRequest $request)
{
    $credentials = $request->only(['email', 'password']);

    if (Auth::attempt($credentials)) {
        return redirect()->route('auth.admin');
    }
    else {
        return back()->withErrors([
            'login' => 'メールアドレスまたはパスワードが間違っています'
        ])->withInput();
    }
}
    public function admin()
    {
    $contacts = Contact::paginate(7);
    return view('auth.admin', compact('contacts'));
    }

    public function reset()
    {
    return redirect()->route('auth.admin');
    }

    public function search(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;

            $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'like', "%{$keyword}%")
                ->orWhere('last_name', 'like', "%{$keyword}%")
                ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ["%{$keyword}%"]);
            });
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }
        $contacts = $query->paginate(7);

        return view('auth.admin', compact('contacts'));
    } 
    
}
