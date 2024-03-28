<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function uploadProfileImage(Request $request)
{
    $request->validate([
        'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'date_of_birth' => 'date',
        'description' => 'nullable|string|max:255',
    ]);

    $imagePath = $request->file('profile_image')->store('profile_images', 'public');
    $user = Auth::user();
    $user->update([
        'profile_image' => $imagePath,
        'date_of_birth' => $request->date_of_birth,
        'description' => $request->description,
    ]);

    return redirect()->route('homepage')->with('success', '¡Profilo aggiornato con succeso!');
}

}
