<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display a landing page index.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        return view('landing.index');
    }

    /**
     * Display a landing page index.
     *
     * @param Request $request
     * @return void
     */
    public function features(Request $request)
    {
        return view('landing.overview');
    }

    /**
     * Display a about the app.
     *
     * @param Request $request
     * @return void
     */
    public function about(Request $request)
    {
        return view('landing.about');
    }

    /**
     * Display a legal notice the app.
     *
     * @param Request $request
     * @return void
     */
    public function legal(Request $request)
    {
        return view('landing.legal');
    }

    /**
     * Display a privacy policy the app.
     *
     * @param Request $request
     * @return void
     */
    public function privacy(Request $request)
    {
        return view('landing.privacy');
    }
}
