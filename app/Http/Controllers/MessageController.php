<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\ClientJob;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(ClientJob $job)
    {
        $messages = $job->messages()->with('sender')->get();
        return view('backend.messages.index', compact('job', 'messages'));
    }


    public function store(ClientJob $job, Request $request)
    {
        $request->validate(['body' => 'required|string|max:1000']);

        $senderId = auth()->id();
        $receiverId = ($job->client_id == $senderId)
            ? $job->freelancer_id
            : $job->client_id;

        $message = $job->messages()->create([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'body' => $request->body
        ]);

        broadcast(new NewMessage($message))->toOthers();

        return redirect()->back();
    }


    // This method is just for testing purposes

    public function sendMessage(Request $request, ClientJob $job)
    {
        // Validation
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        // Get the current user
        $senderId = auth()->id();

        // Determine receiver (the other user in the job conversation)
        $receiverId = $senderId === $job->client_id ? $job->freelancer->id : $job->client->id;

        dd([
            'client_id' => $job->client_id,
            'freelancer_id' => $job->freelancer_id,
            'sender_id' => $senderId,
            'receiver_id' => ($job->client_id == $senderId)
                ? $job->freelancer_id
                : $job->client_id,
        ]);



        // Create the message
        $message = Message::create([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId, // Set the receiver_id dynamically
            'body' => $request->body,
            'clientjob_id' => $job->id,
        ]);


        // Broadcast the message
        broadcast(new NewMessage($message));

        // Redirect back or send a success response
        return back();
    }



    public function messageList()
    {
        // Get the messages of the current authenticated user (both sent and received)
        $messages = Message::with('sender')
            ->where('receiver_id', auth()->id())
            ->latest()
            ->get()
            ->unique('sender_id'); // Keep only one per sender

        // Pass the messages to the view
        return view('backend.messages.allmessage', compact('messages'));
    }
}




    // public function demo(ClientJob $job)
    // {
    //     // Pass the messages to the view
    //     return view('backend.jobs.messages.demo', compact(''));
    // }
