@extends('backend.admin.master')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-12">
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-3">

            {{-- Sidebar with Animated Image --}}
            <div class="bg-gradient-to-br from-cyan-700 to-cyan-900 text-white p-8 flex flex-col items-center space-y-4">
                <div class="relative group">
                    <img src="{{ $freelancer->user->profile_picture 
                                ? asset('storage/' . $freelancer->user->profile_picture)
                                : 'https://via.placeholder.com/150' }}"
                         alt="Profile Picture"
                         class="w-40 h-40 object-cover rounded-full border-4 border-white shadow-lg transition-transform duration-300 group-hover:scale-105 group-hover:rotate-1">
                </div>

                <h2 class="text-2xl font-bold">{{ $freelancer->user->name }}</h2>
                <p class="text-sm text-cyan-100">{{ $freelancer->user->email }}</p>

                <div class="mt-4 space-y-2 w-full">
                    <a href="{{ route('freelancer.visit') }}"
                       class="block text-center px-4 py-2 rounded-full bg-white text-cyan-700 font-semibold hover:bg-gray-100 transition">
                        ⬅️ Back to Browse
                    </a>
                    <a href="{{ route('messages.show', $freelancer->id) }}"
                       class="block text-center px-4 py-2 rounded-full border border-white text-white font-semibold hover:bg-white hover:text-cyan-700 transition">
                        💬 Message
                    </a>
                </div>
            </div>

            {{-- Details Section --}}
            <div class="md:col-span-2 p-10 bg-gray-50 space-y-8">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">👤 Title</h3>
                    <p class="text-gray-700 text-lg">{{ $freelancer->title ?? 'Not provided' }}</p>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">📝 Bio</h3>
                    <p class="text-gray-700 text-lg leading-relaxed">{{ $freelancer->bio ?? 'No bio available' }}</p>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">🛠️ Skills</h3>
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach(explode(',', $freelancer->skills ?? '') as $skill)
                            <span class="bg-cyan-100 text-cyan-800 text-sm px-3 py-1 rounded-full shadow-sm">{{ trim($skill) }}</span>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">💼 Experience</h3>
                    <p class="text-gray-700 text-lg">{{ $freelancer->experience ?? 'No experience added' }}</p>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">🌐 Portfolio</h3>
                    @if($freelancer->portfolio_link)
                        <a href="{{ $freelancer->portfolio_link }}" target="_blank" class="text-cyan-600 hover:underline text-lg">
                            🔗 View Portfolio
                        </a>
                    @else
                        <p class="text-gray-600">No portfolio link available</p>
                    @endif
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">⭐ Rating</h3>
                    <p class="text-yellow-500 text-lg">{{ $freelancer->rating ?? 'Not rated yet' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
