<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Facades\Input;
use Redirect;

class LanguageController extends Controller
{
    public function index(Request $request)
    {
        Session::put('locale', $request->get('locale'));
        return 'ok';
    }
}
