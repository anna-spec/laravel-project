<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function profile()
    {
        $userRole = auth()->user()->role;
        if ($userRole == 'customer') {
            return redirect('/customer/profile');
        } else {
            return redirect('/seller/profile');
        }
    }
}
