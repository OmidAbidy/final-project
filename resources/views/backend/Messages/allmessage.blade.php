@extends('backend.admin.master')

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-12">
        <h1 class="text-3xl font-semibold mb-8 text-gray-800">Messages</h1>

        @if($messages->isEmpty())
            <div class="flex flex-col justify-center items-center h-64 bg-white rounded-xl shadow-lg text-gray-500 text-center">
                <div class="text-4xl mb-2">📭</div>
                <p>No new messages at the moment</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($messages as $message)
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-200">
                        <div class="flex items-center p-4 border-b">
                            <img src="{{ $message->sender->profile_picture 
                                        ? asset('storage/' . $message->sender->profile_picture)
                                        : 'https://via.placeholder.com/150' }}" 
                                 alt="Profile Picture" 
                                 class="w-12 h-12 object-cover rounded-full border-2 border-cyan-600 mr-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $message->sender->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $message->created_at->diffForHumans() }}</p>
                            </div>
                        </div>

                        <div class="p-4">
                            <p class="text-gray-700 text-sm">
                                {{ \Illuminate\Support\Str::limit($message->body, 100) }}
                            </p>
                        </div>

                        <div class="flex justify-between items-center p-4 border-t">
                            <a href="{{ route('messages.demo', $message->id) }}" 
                               class="text-cyan-600 hover:underline text-sm">
                                View Message
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
