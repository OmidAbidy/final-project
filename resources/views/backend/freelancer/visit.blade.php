@extends('backend.admin.master')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold text-cyan-800 dark:text-white mb-10 text-center">Browse Freelancers</h1>

    <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($freelancers as $freelancer)
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 overflow-hidden flex flex-col">
                <img 
                    class="w-full h-48 object-cover" 
                    src="{{ asset('storage/' . $freelancer->user->profile_picture) ?? 'https://via.placeholder.com/400x300' }}" 
                    alt="Profile Picture"
                >
                <div class="p-6 flex flex-col justify-between h-full">
                    <div>
                        <h2 class="text-2xl font-semibold text-cyan-900 dark:text-white">{{ $freelancer->user->name }}</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-300 mb-2">{{ $freelancer->title ?? 'Freelancer' }}</p>
                        <p class="text-gray-700 dark:text-gray-300 text-sm line-clamp-3">{{ $freelancer->bio }}</p>

                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach(explode(',', $freelancer->skills) as $skill)
                                <span class="text-xs bg-[rgba(139,200,204,0.7)] text-cyan-800 px-3 py-1 rounded-full">{{ trim($skill) }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('freelancer.publicShow', $freelancer->id) }}" 
                            class="inline-flex items-center justify-center bg-cyan-700 hover:bg-cyan-800 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition">
                            View Profile
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
