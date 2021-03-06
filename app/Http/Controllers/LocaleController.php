<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LocaleController extends Controller
{
    public function index(Request $request, $locale)
    {
        $request->session()->put('locale',$locale);
        return Redirect::back();
    }
}
