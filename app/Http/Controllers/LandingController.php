<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
        return view('landing.features.overview');
    }

    /**
     * Display a landing page index.
     *
     * @param Request $request
     * @return void
     */
    public function featuresSaving(Request $request)
    {
        return view('landing.features.saving-book');
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
     * Display a pricing table.
     *
     * @param Request $request
     * @return void
     */
    public function pricing(Request $request)
    {
        return view('landing.pricing');
    }

    /**
     * Display a legal notice the app.
     *
     * @param Request $request
     * @return void
     */
    public function disclaimer(Request $request)
    {
        return view('landing.legal.disclaimer');
    }

    /**
     * Display a privacy policy the app.
     *
     * @param Request $request
     * @return void
     */
    public function privacy(Request $request)
    {
        return view('landing.legal.privacy');
    }

    /**
     * Display a service level agreement the app.
     *
     * @param Request $request
     * @return void
     */
    public function sla(Request $request)
    {
        return view('landing.legal.sla');
    }

    /**
     * Display a help the app.
     *
     * @param Request $request
     * @return void
     */
    public function help(Request $request)
    {
        return view('landing.help');
    }

    /**
     * Display a help the app.
     *
     * @param Request $request
     * @return void
     */
    public function brandAsset(Request $request)
    {
        return view('landing.brand');
    }
}
