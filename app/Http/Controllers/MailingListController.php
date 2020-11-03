<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Inertia\Inertia;

class MailingListController extends Controller
{
    public function index()
    {
        return Inertia::render('MailingList/Index');
    }

    public function subscribers(Request $request, $x = '')
    {
        return Inertia::render('MailingList/Show');
    }
}
