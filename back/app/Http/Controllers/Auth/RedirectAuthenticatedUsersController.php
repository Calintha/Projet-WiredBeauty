<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (auth()->user()->role_id == '2') {
            return redirect('/admin_dashboard');
        }
        elseif(auth()->user()->role_id == '1'){
            return redirect('/members_dashboard');
        }
        else{
            return auth()->logout();
        }
    }
}