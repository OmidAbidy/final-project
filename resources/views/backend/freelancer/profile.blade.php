@extends('backend.admin.master')

@section('content')
    <div class="flex justify-center py-12 px-4 ">
        <div class="w-full max-w-6xl bg-white rounded-xl shadow-lg overflow-hidden">
            @if (isset($freelancerProfile))
                <div class="grid grid-cols-1 md:grid-cols-3">
                    
                    {{-- Left Panel --}}
                    <div class="bg-[rgba(121,176,182,0.7)] p-8 flex flex-col items-center text-black space-y-4">
                        @php
                            $profilePicture = auth()->user()->profile_picture
                                ? asset('storage/' . auth()->user()->profile_picture)
                                : asset('images/1.jpg');
                        @endphp

                        <img src="{{ $profilePicture }}" alt="Profile Picture"
                             class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-md">

                        <div class="text-center text-black">
                            <h2 class="text-2xl font-bold">{{ auth()->user()->name }}</h2>
                            <p class="text-sm ">{{ auth()->user()->email }}</p>
                        </div>

                        {{-- Buttons – naturally stacked, responsive --}}
                        <div class="flex flex-col gap-3 w-full mt-6">
                            <a href="{{ route('freelancer.edit', ['id' => $freelancerProfile->id]) }}"
                               class="bg-white text-[rgba(120,186,192,1)] font-semibold py-2 rounded-md text-center  hover:bg-gray-100 transition duration-200">
                                ✏️ Edit Profile
                            </a>
                            <a href="{{ route('dashboard') }}"
                               class="border border-white text-white py-2 rounded-md text-center hover:bg-[rgba(126,174,179,0.7)] hover:text-[rgba(120,186,192,1)] transition duration-200">
                                ⬅️ Back to Dashboard
                            </a>
                        </div>
                    </div>

                    {{-- Right Panel (Details) --}}
                    <div class="col-span-2 p-8 space-y-6 bg-gray-50">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Bio</h3>
                            <p class="text-gray-600">{{ $freelancerProfile->bio ?? 'No bio available' }}</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Skills</h3>
                            <p class="text-gray-600">{{ $freelancerProfile->skills ?? 'No skills listed' }}</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Experience</h3>
                            <p class="text-gray-600">{{ $freelancerProfile->experience ?? 'No experience provided' }}</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Portfolio</h3>
                            <a href="{{ $freelancerProfile->portfolio_link ?? '#' }}" target="_blank"
                               class="text-[rgba(120,186,192,1)] hover:underline">
                                {{ $freelancerProfile->portfolio_link ?? 'No portfolio' }}
                            </a>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Rating</h3>
                            <p class="text-gray-600">{{ $freelancerProfile->rating ?? 'No rating' }}</p>
                        </div>
                    </div>

                </div>
            @else
                <div class="text-center py-12 w-full bg-white rounded-xl shadow-md">
                    <p class="text-lg text-gray-700 mb-4">No freelancer profile found.</p>
                    <a href="{{ route('freelancer.create') }}"
                       class="bg-green-500 text-white px-6 py-3 rounded-full hover:bg-green-600 transition">
                        ➕ Create Profile
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
