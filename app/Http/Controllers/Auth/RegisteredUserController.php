<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telephone' => 'required|max:15|unique:users,telephone',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ], [
            'first_name.required' => 'Silakan isi nama depan terlebih dahulu!',
            'email.required' => 'Silakan isi email terlebih dahulu!',
            'email.email' => 'Format email tidak valid!',
            'email.unique' => 'Email sudah terdaftar!',
            'telephone.required' => 'Silakan isi nomor telepon terlebih dahulu!',
            'telephone.numeric' => 'Nomor telepon harus berupa angka!',
            'telephone.unique' => 'Nomor telepon sudah terdaftar!',
            'telephone.max' => 'Nomor telepon maksimal 15 karakter!',
            'password.required' => 'Silakan isi password terlebih dahulu!',
            'password.min' => 'Password minimal 8 karakter!',
            'password.confirmed' => 'Konfirmasi password tidak sama!',
            'password_confirmation.required' => 'Silakan isi konfirmasi password terlebih dahulu!',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        try {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'password' => Hash::make($request->password),
                'type' => 'customer',
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan!',
                'data' => $user
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
