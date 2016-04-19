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
     * Saves the weight of the authenticated user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function weight() {
        $user = \Auth::user();
//        dd($user);
        return view('pages/weight', compact('user'));
    }

    public function store(Request $request) {
        $auth = \Auth::user()->id;
        $user = \App\User::where(['id' => $auth])->get()->first();
        $weight = $request->request->all()['weight'];
        $user->weight = $weight;
        $user->save();
        flash()->success("Your current weight has been recorded.");

        return redirect('workouts/index');
    }
}
