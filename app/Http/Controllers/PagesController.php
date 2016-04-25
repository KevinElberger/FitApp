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
     * Displays the currently recorded weight of the user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function weight() {
        $user = \Auth::user();
        $id = \Auth::user()->id;
        $weight = $user->weights()->get()->last();
        $lift = \App\Weight::where(['user_id' => $id])->get()->first();
        $weightCollection = \App\Weight::where(['user_id' => $id])->get();
        return view('pages/weight', compact('user', 'weight', 'weightCollection', 'lift'));
    }

    /**
     * Saves a new weight.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        $weight = \Auth::user()->weights()->create($request->all());
//        $auth = \Auth::user()->id;
//        $user = \App\User::where(['id' => $auth])->get()->first();
//        $weight = $request->request->all()['weight'];
//        $user->weight = $weight;
//        $user->save();
        flash()->success("Your current weight has been recorded.");

        return redirect('workouts/index');
    }

    /**
     * Page used for COMP 484 Lab 7.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function employee() {
        return view('pages/employee');
    }
}
