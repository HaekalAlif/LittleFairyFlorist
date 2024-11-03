<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['success' => true], 200);
        }
        return response()->json(['success' => false, 'message' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Hapus semua token user jika menggunakan Sanctum
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }
        
        return response()->json(['message' => 'Logged out successfully']);
    }
}