<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\ClientJob;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(ClientJob $job)
    {
        $messages = $job->messages()->with('sender')->get();
        return view('backend.jobs.messages.index', compact('job', 'messages'));
    }


    public function store(ClientJob $job, Request $request)
    {
        $request->validate(['body' => 'required|string|max:1000']);
    
        $senderId = auth()->id();
        $receiverId = ($job->client_id == $senderId)
            ? $job->freelancer_id
            : $job->client_id;
    
        \Log::info('Sender ID: ' . $senderId);
        \Log::info('Client ID: ' . $job->client_id);
        \Log::info('Freelancer ID: ' . $job->freelancer_id);
        \Log::info('Receiver ID resolved as: ' . $receiverId);
    
        // dd([
        //     'sender_id' => $senderId,
        //     'receiver_id' => $receiverId,
        //     'body' => $request->body,
        //     'clientjob_id' => $job->id
        // ]);
    
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

    public function demo()
    {
        return view('backend.jobs.messages.demo');
    }
    
}
