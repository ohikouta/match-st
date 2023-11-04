<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Cloudinary;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'image' => ['image', 'max:2048'],
            'birthdate' => ['required', 'date'],
            'univ' => ['required', 'string'],
            'grade' => ['required', Rule::in(['学部1年', '学部2年', '学部3年', '学部4年', '修士1年', '修士2年', '博士1年', '博士2年', '博士3年'])],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        if ($request->hasFile('image')) {
            // Cloudinaryに画像をアップロードし、そのURLを取得
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'image' => $image_url, // 画像のURLを保存
                'birthdate' => $request->birthdate,
                'univ' => $request->univ,
                'grade' => $request->grade,
                'password' => Hash::make($request->password),
                
            ]);
            
        }


        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('users.index');
    }
}
