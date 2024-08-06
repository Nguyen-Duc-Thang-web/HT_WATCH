<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admincontroller extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function indexUser()
    {
        $users = User::all();
        return view('admin.contents.users.list', compact('users'));
    }
}
