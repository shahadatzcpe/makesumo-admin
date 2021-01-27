<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\AccessibleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Laravel\Cashier\PaymentMethod;


class AccountSettings extends Controller {

    public function profile() {
        $this->props['profile'] = Auth::user();
        return Inertia::render('AccountSettings/Profile', $this->props);
    }

    public function updateProfile() {
    }

    public function security() {
        $this->props['profile'] = Auth::user();
        return Inertia::render('AccountSettings/Security', $this->props);
    }

    public function updatePassword() {
    }


    public function plan() {
        $this->props['profile'] = Auth::user();
        return Inertia::render('AccountSettings/Plan', $this->props);
    }
}
