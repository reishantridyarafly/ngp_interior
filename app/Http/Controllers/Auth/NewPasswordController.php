<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ], [
            'email.required' => 'Silakan isi email terlebih dahulu!',
            'email.email' => 'Format email tidak valid!',
            'password.required' => 'Silakan isi password terlebih dahulu!',
            'password.min' => 'Password minimal 8 karakter!',
            'password.confirmed' => 'Konfirmasi password tidak sama!',
            'password_confirmation.required' => 'Silakan isi konfirmasi password terlebih dahulu!',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            try {
                Password::reset(
                    $request->only('email', 'password', 'password_confirmation', 'token'),
                    function ($user) use ($request) {
                        $user->forceFill([
                            'password' => Hash::make($request->password),
                            'remember_token' => Str::random(60),
                        ])->save();

                        event(new PasswordReset($user));
                    }
                );

                return response()->json([
                    'status' => 'success',
                    'title' => 'Berhasil',
                    'message' => 'Data berhasil disimpan!',
                ], 201);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error during registration',
                    'error' => $e->getMessage()
                ], 500);
            }
        }
    }
}
