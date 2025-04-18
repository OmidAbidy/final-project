@extends('backend.admin.master')

@section('content')
<div class="container">
    <h2>Messages for Job: {{ $job->title }}</h2>
    
    <div id="messages" class="mb-4" style="height: 400px; overflow-y: auto;">
        @foreach($messages as $message)
            <div class="mb-3 @if($message->sender_id == auth()->id()) text-end @endif">
                <strong>{{ $message->sender->name }}:</strong>
                <p class="mb-0">{{ $message->body }}</p>
                <small>{{ $message->created_at->diffForHumans() }}</small>
            </div>
        @endforeach
    </div>

    <form method="POST" action="{{ route('messages.send', $job) }}">
        @csrf
        <div class="input-group">
            <textarea name="body" class="form-control" rows="2" placeholder="Type your message..."></textarea>
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: '{{ config('broadcasting.connections.pusher.key') }}',
        cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}',
        wsHost: '{{ config('broadcasting.connections.pusher.options.host') }}',
        wsPort: '{{ config('broadcasting.connections.pusher.options.port') }}',
        forceTLS: false,
        encrypted: true,
        disableStats: true,
    });

    Echo.join(`job.{{ $job->id }}`)
        .listen('NewMessage', (data) => {
            const messagesDiv = document.getElementById('messages');
            const isCurrentUser = data.message.sender_id === {{ auth()->id() }};
            
            const messageHtml = `
                <div class="mb-3 ${isCurrentUser ? 'text-end' : ''}">
                    <strong>${data.message.sender.name}:</strong>
                    <p class="mb-0">${data.message.body}</p>
                    <small>Just now</small>
                </div>
            `;
            
            messagesDiv.innerHTML += messageHtml;
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        });
</script>
@endsection