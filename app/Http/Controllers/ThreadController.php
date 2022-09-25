<?php

namespace App\Http\Controllers;

use App\Models\ThreadMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
        $threads = Auth::user()->threads()->get();
        return view('threads.threads')->with("threads", $threads);
    }

    /**
     * Display the specified thread details.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thread = Thread::find($id);
        if ($thread !== null) {
            $thread_messages = $thread->messages()->get();
            return view('threads.view')->with(["thread" => $thread, "messages" => $thread_messages]);
        } else {
            return Redirect::route('threads')->with('error', 'Thread no longer exists!');
        }

    }

    /**
     * Show the form for creating a new thread.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('threads.create');
    }

    /**
     * Store a newly created thread in the database.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255'
        ]);
        $thread = Thread::create(['thread_title' => $request->post('title'), 'client_id' => Auth::user()->id, 'status' => "open"]);
        if ($thread->id) {
            return Redirect::route('threads')->with('success', 'Thread created successfully!');
        } else {
            return back()->withInput()->withErrors(['Error while creating the thread, please try again. If the issue persist, contact Admin']);
        }

    }

    public function storeMessage(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|min:2|max:1500'
        ]);

        $message = ThreadMessage::create(['thread_id' => $request->post('thread_id'), 'message' => $request->post("message"), 'type' => $request->post('type')]);
        if ($message->id) {
            return Redirect::route('threads.show',['id' => $request->post('thread_id')]);
        } else {
            return back()->withInput()->withErrors(['Error while adding the message to the thread, please try again. If the issue persist, contact Admin']);
        }
    }
}
