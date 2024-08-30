<?php 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Display the user's profile
    public function show($id)
{
    // Find the user by ID (the user whose profile is being viewed)
    $user = User::findOrFail($id);

    // Get the current authenticated user's ID
    $currentUserId = auth()->id();

    // Log the IDs for debugging
    \Log::info("Displaying profile for user ID: {$user->id}");
    \Log::info("Current authenticated user ID: {$currentUserId}");

    // Fetch users to follow, excluding the current user and the user being viewed
    $usersToFollow = User::where('id', '!=', $id) // Exclude the user being viewed
                          ->where('id', '!=', $currentUserId) // Exclude the current user
                          ->get();

    // Log the IDs of users to follow
    foreach ($usersToFollow as $userToFollow) {
        \Log::info("User to follow ID: {$userToFollow->id}");
    }

    // Pass data to the view
    return view('users.show', compact('user', 'usersToFollow'));
}




    // Display the form to edit the user profile
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Update the user profile
    public function update(Request $request, User $user)
{
    // Validate the request
    $validated= $request->validate([
        'name' => 'nullable|string|max:255',
        'bio' => 'nullable|string|max:1000',
        'image' => 'image',
    ]);

    // Update user information
    $user->name = $request->input('name', $user->name);
    $user->bio = $request->input('bio', $user->bio);

    // Handle profile picture upload
    if ($request->has('image')) {

        $imagePath= request()->file('image')->store('profile','public');
        $validated['image']= $imagePath;
        

        
    }

        $user->update($validated);

    return redirect()->route('users.show', $user)->with('success', 'Profile updated successfully.');
}

}
