@extends('backend.admin.master')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Messages for Job: {{ $job->title }}</h2>

    <div id="messages" class="h-96 overflow-y-auto space-y-4 px-4 py-2 bg-gray-100 rounded-md mb-6 scroll-smooth">
        @foreach($messages as $message)
            <div class="flex {{ $message->sender_id == auth()->id() ? 'justify-end' : 'justify-start' }}">
                <div class="{{ $message->sender_id == auth()->id() ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800' }} max-w-sm p-3 rounded-lg">
                    <div class="text-sm font-semibold mb-1">{{ $message->sender->name }}</div>
                    <p class="text-sm">{{ $message->body }}</p>
                    <div class="text-xs mt-1 text-right opacity-70">{{ $message->created_at->diffForHumans() }}</div>
                </div>
            </div>
        @endforeach
    </div>

    <form method="POST" action="{{ route('messages.send', $job) }}" class="flex items-center space-x-2">
        @csrf
        <textarea name="body" rows="2" placeholder="Type your message..." class="w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none"></textarea>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md font-semibold">
            Send
        </button>
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

    Echo.channel(`ClientJob.{{ auth()->id() }}`)
        .listen('NewMessage', (data) => {
            const messagesDiv = document.getElementById('messages');
            const isCurrentUser = data.message.sender_id === {{ auth()->id() }};

            const messageHtml = `
                <div class="flex ${isCurrentUser ? 'justify-end' : 'justify-start'}">
                    <div class="${isCurrentUser ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800'} max-w-sm p-3 rounded-lg">
                        <div class="text-sm font-semibold mb-1">${data.message.sender.name}</div>
                        <p class="text-sm">${data.message.body}</p>
                        <div class="text-xs mt-1 text-right opacity-70">Just now</div>
                    </div>
                </div>
            `;

            messagesDiv.innerHTML += messageHtml;
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        });
</script>
@endsection
