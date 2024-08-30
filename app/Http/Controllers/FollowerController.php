<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function follow($userId)
    {
        $currentUserId = auth()->id(); // Get the current authenticated user's ID
        \Log::info('Current User ID: ' . $currentUserId);
        \Log::info('User to Follow ID: ' . $userId);

        $currentUser = User::findOrFail($currentUserId);
        $userToFollow = User::findOrFail($userId);

        $currentUser->followings()->attach($userToFollow->id);

        return redirect()->back()->with('success', 'You are now following ' . $userToFollow->name);
    }

    public function unfollow($userId)
    {
        // Detach the authenticated user from the followed user's followers list
        $currentUser = auth()->user();
        $userToUnfollow = User::findOrFail($userId);

        $currentUser->followings()->detach($userToUnfollow->id);

        return redirect()->back()->with('success', 'You have unfollowed ' . $userToUnfollow->name);
    }

    public function followingList()
    {
        $user = auth()->user();
        
        // Get users the current user is following and their follower counts
        $followingUsers = $user->followings()->withCount('followers')->get();
        
        return view('following-list', compact('followingUsers'));
    }
}
