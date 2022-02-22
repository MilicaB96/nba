<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store($id)
    {
        $user = User::findOrFail($id);
        $user->is_verified = true;
        $user->save();
        return redirect('/login');
    }
}
