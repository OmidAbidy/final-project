
@extends('backend.admin.master')

@section('content')
    @if($clientProfile)
        <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
            <!-- Profile Picture Section -->
            <div class="bg-gray-50 dark:bg-gray-700 p-6 flex flex-col items-center">
                <img class="h-24 w-24 rounded-full object-cover border-4 border-[rgba(120,186,192,0.7)] dark:border-[rgba(120,186,192,0.7)]" 
                     src="{{ auth()->user()->profile_picture ? Storage::url(auth()->user()->profile_picture) : 'https://via.placeholder.com/150' }}" 
                     alt="Profile Picture">
                <h2 class="mt-4 text-xl font-bold text-gray-900 dark:text-white">{{ $clientProfile->company_name }}</h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Client Profile</p>
            </div>
            <!-- Client Details Section -->
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Client Profile</h1>
                    <a href="{{ route('client.edit') }}" 
                       class="inline-flex items-center px-4 py-2 bg-[rgba(120,186,192,0.7)] text-gray-900 rounded-md hover:bg-[rgba(120,186,192,0.9)] transition-colors duration-200">
                        Edit Profile
                    </a>
                </div>
                <div class="mt-6 space-y-6">
                    <div>
                        <h3 class="text-lg font-medium text-gray-700 dark:text-gray-200">Company Name</h3>
                        <p class="mt-1 text-gray-600 dark:text-gray-300">{{ $clientProfile->company_name }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-700 dark:text-gray-200">Description</h3>
                        <p class="mt-1 text-gray-600 dark:text-gray-300">{{ $clientProfile->company_description ?? 'No description available' }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-700 dark:text-gray-200">Website</h3>
                        <p class="mt-1 text-gray-600 dark:text-gray-300">
                            @if($clientProfile->website_name)
                                <a href="{{ $clientProfile->website_name }}" target="_blank" 
                                   class="text-[rgba(120,186,192,0.7)] dark:text-[rgba(120,186,192,0.7)] hover:underline">
                                   {{ $clientProfile->website_name }}
                                </a>
                            @else
                                N/A
                            @endif
                        </p>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-700 dark:text-gray-200">Industry</h3>
                        <p class="mt-1 text-gray-600 dark:text-gray-300">{{ $clientProfile->industry ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="max-w-md mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 text-center">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">No Client Profile Found</h2>
            <p class="mt-2 text-gray-600 dark:text-gray-300">Create your client profile to get started.</p>
            <a href="{{ route('client.create') }}" 
               class="mt-4 inline-flex items-center px-4 py-2 bg-[rgba(120,186,192,0.7)] text-gray-900 rounded-md hover:bg-[rgba(120,186,192,0.9)] transition-colors duration-200">
                Create Profile
            </a>
        </div>
    @endif
@endsection
