<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve users from the database
        $users = User::all(); // or use a specific query to filter users if needed

        // Pass users to the view
        return view('dashboard', [
            'users' => $users
        ]);
    }
}
