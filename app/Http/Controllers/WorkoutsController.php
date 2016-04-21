<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Workout;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class WorkoutsController extends Controller
{
    /**
     * Create a new workouts controller instance.
     *
     * WorkoutsController constructor.
     */
    public function __construct() {
    }
    /**
     * Display all workouts of a user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $user = \Auth::user();
        $workouts = Workout::latest();
        return view('workouts/index', compact('user','workouts'));
    }
    /**
     * Grab the correct individual workout (lift) to display to the user.
     *
     * @param Workout $workout
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($user, $name) {
        $user = \App\User::where(['name' => $user])->get()->first();
        $userName = \Auth::user()->id;
        $lift = \App\Workout::where(['name' => $name])->get()->first();
        $liftCollection = \App\Workout::where(['user_id' => $userName])->get();
        $weight = \Auth::user()->weights()->get()->last();
        $userWeight = \App\Weight::where(['user_id' => \Auth::user()->id])->get()->last();
        return view('workouts/show', compact('lift', 'user', 'liftCollection', 'weight','userWeight'));
    }
    /**
     * Add a workout for a user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
        return view('workouts/create');
    }
    /**
     * Saves a workout.
     *
     * @param Requests\WorkoutRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Requests\WorkoutRequest $request) {
        $this->createWorkout($request);
        flash()->success('Your workout has been logged.');
        return redirect('workouts/index');
    }
    /**
     * Save a new workout.
     *
     * @param Requests\WorkoutRequest $request
     * @return mixed
     */
    public function createWorkout(Requests\WorkoutRequest $request) {
        $workout = \Auth::user()->workouts()->create($request->all());
        return $workout;
    }
}