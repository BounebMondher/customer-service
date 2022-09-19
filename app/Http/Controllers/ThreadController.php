<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Thread;

class ThreadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the customer threads.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::where("client_id", Auth::user()->id)->orderBy("id", "DESC")->get();
        return view('threads.threads')->with("threads", $threads);
    }

    /**
     * Display the specified thread details.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('threads.view')->with("d","d");
    }
}
