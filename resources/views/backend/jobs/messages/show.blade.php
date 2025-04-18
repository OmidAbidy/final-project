@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Conversation for Job: {{ $job->title }}</h4>
            <small>With: 
                {{ auth()->id() === $job->client_id ? $job->freelancer->name : $job->client->name }}
            </small>
        </div>

        <div class="card-body">
            <div id="chat-messages" style="height: 400px; overflow-y: auto;">
                @foreach ($messages as $message)
                    <div class="mb-3 @if($message->sender_id === auth()->id()) text-end @endif">
                        <div class="d-flex align-items-center gap-2">
                            <strong>{{ $message->sender->name }}:</strong>
                            <span class="badge bg-secondary">{{ $message->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="mb-0">{{ $message->body }}</p>
                    </div>
                @endforeach
            </div>

            <form method="POST" action="{{ route('messages.send', $job) }}" class="mt-4">
                @csrf
                <div class="input-group">
                    <textarea name="body" class="form-control" rows="2" placeholder="Type your message..."></textarea>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    // Laravel Echo setup
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: '{{ config('broadcasting.connections.pusher.key') }}',
        wsHost: '{{ config('broadcasting.connections.pusher.options.host') }}',
        wsPort: '{{ config('broadcasting.connections.pusher.options.port') }}',
        forceTLS: false,
        encrypted: false,
        disableStats: true,
    });

    // Listen to messages for this job
    window.Echo.private(`job.${@json($job->id)}`)
        .listen('NewMessage', (data) => {
            const chatDiv = document.getElementById('chat-messages');
            const isCurrentUser = data.message.sender_id === {{ auth()->id() }};

            const messageHtml = `
                <div class="mb-3 ${isCurrentUser ? 'text-end' : ''}">
                    <div class="d-flex align-items-center gap-2">
                        <strong>${data.message.sender.name}:</strong>
                        <span class="badge bg-secondary">Just now</span>
                    </div>
                    <p class="mb-0">${data.message.body}</p>
                </div>
            `;

            chatDiv.innerHTML += messageHtml;
            chatDiv.scrollTop = chatDiv.scrollHeight; // Auto-scroll
        });
</script>
@endsection