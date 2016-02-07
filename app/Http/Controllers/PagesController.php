<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Return the default login page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $user = \Auth::user();
        return view('pages/home', compact('user'));
    }

    /**
     * Returns the weight page of the authenticated user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function weight() {

        $user = \Auth::user();

        return view('pages/weight', compact('user'));
    }
}
