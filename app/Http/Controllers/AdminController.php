<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class AdminController extends Controller
{
    //
      public function index()

    {
        $users = User::count();
        return Inertia::render('AdminDashboard', [
          'counts' => $users
        ]);
    }
}
