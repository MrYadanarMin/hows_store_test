<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiTestingController extends Controller
{
    public function index()
    {
        return view('apitest.apitest1');
    }

    // Corresponds to 'apitest.create' or a custom view (formerly apitest2)
    public function create()
    {
        return view('apitest.apitest2');
    }
}
