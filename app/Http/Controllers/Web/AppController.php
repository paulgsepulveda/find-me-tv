<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function personal()
    {
        return view('app');
    }
}
