<?php

namespace App\Http\Controllers;


use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Users/Index');
    }
    public function paidSubscribers()
    {
        return Inertia::render('Users/PaidSubscribers');
    }
    public function trailSubscribers()
    {
        return Inertia::render('Users/TrailSubscribers');
    }
}
