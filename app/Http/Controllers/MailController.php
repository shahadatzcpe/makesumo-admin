<?php

namespace App\Http\Controllers;


use Inertia\Inertia;

class MailController extends Controller
{
    public function index()
    {
        return Inertia::render('Mail/Index');
    }

    public function create()
    {
        return Inertia::render('Mail/Create');
    }

}
