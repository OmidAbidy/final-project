@extends('backend.admin.master')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Job Card -->
        <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
            <!-- Header -->
            <div
                class="bg-[rgba(120,186,192,0.7)] p-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-white flex items-center gap-2">
                        <i class="fas fa-briefcase"></i> {{ $job->title }}
                    </h2>
                    <div class="mt-2 flex flex-wrap items-center gap-2 text-white text-sm">
                        <span class="bg-white text-gray-700 px-3 py-1 rounded-full font-medium shadow">
                            {{ ucfirst(str_replace('_', ' ', $job->status)) }}
                        </span>
                        <span class="flex items-center gap-1">
                            <i class="fas fa-calendar-alt"></i> Posted {{ $job->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2">
                    @can('client')
                        <a href="{{ route('jobs.edit', $job) }}"
                            class="text-sm bg-white text-gray-700 px-4 py-2 rounded shadow hover:bg-gray-100">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <form action="{{ route('jobs.destroy', $job) }}" method="POST"
                            onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-sm bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700">
                                <i class="fas fa-trash mr-1"></i> Delete
                            </button>
                        </form>
                    @elseif(auth()->user()->can('isadmin'))
                        <a href="{{ route('jobs.edit', $job) }}"
                            class="text-sm bg-white text-gray-700 px-4 py-2 rounded shadow hover:bg-gray-100">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <form action="{{ route('jobs.destroy', $job) }}" method="POST"
                            onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-sm bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700">
                                <i class="fas fa-trash mr-1"></i> Delete
                            </button>
                        </form>
                    @endcan
                </div>
            </div>

            <!-- Body -->
            <div class="p-6 grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Description & Terms -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-gray-50 p-4 rounded-md border border-gray-200">
                        <h3 class="text-lg font-semibold text-[rgba(120,186,192,1)] mb-2">
                            <i class="fas fa-align-left mr-1"></i> Job Description
                        </h3>
                        <p class="text-gray-700 leading-relaxed">{!! nl2br(e($job->description)) !!}</p>
                    </div>

                    @if ($job->terms)
                        <div class="bg-gray-50 p-4 rounded-md border border-gray-200">
                            <h3 class="text-lg font-semibold text-[rgba(120,186,192,1)] mb-2">
                                <i class="fas fa-file-contract mr-1"></i> Additional Terms
                            </h3>
                            <p class="text-gray-700 leading-relaxed">{!! nl2br(e($job->terms)) !!}</p>
                        </div>
                    @endif
                    <!-- Back Button -->
                    <div class="mb-6">
                        <a href="{{ url()->previous() }}"
                            class="inline-flex items-center gap-2 text-white bg-[rgba(120,186,192,0.7)] px-4 py-2 rounded hover:bg-teal-400 transition">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Job Details -->
                    <div class="border border-gray-200 rounded-md overflow-hidden">
                        <div class="bg-[rgba(120,186,192,0.7)] text-white px-4 py-3 font-bold">
                            <i class="fas fa-info-circle mr-2"></i> Job Details
                        </div>
                        <div class="p-4 space-y-3 text-sm text-gray-700">
                            <div class="flex justify-between">
                                <span><i class="fas fa-tag mr-1 text-gray-400"></i> Category</span>
                                <span>{{ $job->category->name ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span><i class="fas fa-dollar-sign mr-1 text-gray-400"></i> Budget</span>
                                <span>{{ ucfirst($job->budget_type) }}: ${{ number_format($job->budget_amount, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span><i class="fas fa-map-marker-alt mr-1 text-gray-400"></i> Location</span>
                                <span>{{ $job->location }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span><i class="fas fa-calendar-check mr-1 text-gray-400"></i> Apply By</span>
                                <span>{{ $job->application_deadline->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Client Info -->
                    <div class="border border-gray-200 rounded-md overflow-hidden">
                        <div class="bg-[rgba(120,186,192,0.7)] text-white px-4 py-3 font-bold">
                            <i class="fas fa-user mr-2"></i> Client Info
                        </div>
                        <div class="p-4">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($job->client->name) }}&background=random"
                                    class="rounded-full w-12 h-12" alt="Client Avatar">
                                <div>
                                    <p class="font-semibold">{{ $job->client->name }}</p>
                                    <p class="text-sm text-gray-500">Member since
                                        {{ $job->client->created_at->format('M Y') }}</p>
                                </div>
                            </div>
                            <a href="{{ route('messages.show', ['job' => $job->id]) }}"
                                class="block mt-4 w-full text-center bg-white border border-[rgba(120,186,192,0.7)] text-[rgba(120,186,192,1)] px-4 py-2 rounded hover:bg-teal-50 transition">
                                <i class="fas fa-envelope mr-1"></i> Contact Client
                            </a>
                        </div>
                    </div>

                    <!-- Proposal Button -->
                    @if (auth()->check() && auth()->user()->isFreelancer())
                        @php
                            $alreadySubmitted = \App\Models\Proposal::where('freelancer_id', auth()->id())
                                ->where('clientjob_id', $job->id)
                                ->exists();
                        @endphp

                        @if (!$alreadySubmitted)
                            <a href="{{ route('proposals.create', ['clientjob_id' => $job->id]) }}"
                                class="block w-full text-center bg-[rgba(120,186,192,0.7)] text-white font-semibold px-4 py-2 rounded hover:bg-teal-600 transition">
                                Submit Proposal
                            </a>
                        @else
                            <p class="text-sm text-gray-500 text-center">You’ve already submitted a proposal for this job.
                            </p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
