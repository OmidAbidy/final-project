@extends('backend.admin.master')

@section('content')
    <div class="min-h-screen flex justify-center items-start py-10 px-4">
        <div class="w-full max-w-3xl bg-slate-100 rounded-xl shadow-xl p-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">📄 Proposal Details</h2>

            <div class="space-y-4 text-cyan-800">
                <p>
                    <span class="font-semibold text-cyan-700">💼 Job:</span>
                    <span class="text-lg">{{ $job->title }}</span>
                </p>

                <p>
                    <span class="font-semibold text-cyan-700">👨‍💻 Freelancer:</span>
                    <span>{{ $proposal->freelancer->name }}</span>
                </p>

                <p>
                    <span class="font-semibold text-cyan-700">💰 Bid Amount:</span>
                    <span>${{ $proposal->bid_amount }}</span>
                </p>

                <p>
                    <span class="font-semibold text-cyan-700">📦 Delivery Time:</span>
                    <span>{{ $proposal->delivery_time }}</span>
                </p>

                <p>
                    <span class="font-semibold text-cyan-700">📄 Description:</span><br>
                    <span class="whitespace-pre-line">{{ $proposal->description }}</span>
                </p>

                <p>
                    <span class="font-semibold text-cyan-700">📌 Status:</span>
                    <span
                        class="inline-block px-3 py-1 rounded-full text-white text-sm font-medium
                    {{ $proposal->status === 'accepted' ? 'bg-green-600' : ($proposal->status === 'rejected' ? 'bg-red-600' : 'bg-yellow-500') }}">
                        {{ ucfirst($proposal->status) }}
                    </span>
                </p>
            </div>

            <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4">

                {{-- Back Button --}}
                <div class="mt-8 text-center">
                    <a href="{{ route('messages.show', $job) }}"
                        class="bg-[rgba(120,186,192,0.7)] hover:bg-cyan-700 text-white font-semibold px-6 py-2 mx-2 rounded-full transition duration-200">
                        💬 Message
                    </a> 
                    <a href="{{ route('proposals.index') }}"
                        class="inline-block bg-[rgba(120,186,192,0.7)] hover:bg-cyan-700 text-white font-medium px-6 py-2 rounded-full transition duration-200">
                        ⬅️ Back
                    </a>
                </div>
                @if (auth()->user()->isClient())
                    <div class="w-full sm:w-auto">
                        @include('backend.proposals.components.status-form')
                    </div>
                @endif


            </div>
        </div>
    </div>
@endsection
