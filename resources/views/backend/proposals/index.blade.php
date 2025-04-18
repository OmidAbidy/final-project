@extends('backend.admin.master')

@section('content')
<div class="py-12 px-4 md:px-8">
    <div class=" shadow-2xl p-6 md:p-10 backdrop-blur-md">

        <h2 class="text-3xl font-bold text-gray-800 mb-2 text-center">📑 Proposals</h2>
        <p class="text-gray-700 text-center mb-6">Here are the proposals you have submitted or received.</p>

        @can('view-shortlisted-proposals')

            <div class="flex flex-col sm:flex-row justify-center gap-4 mb-6">
                <a href="{{ route('proposals.index') }}"
                   class="bg-white text-gray-800 border border-gray-300 px-6 py-2 text-sm font-semibold rounded-full shadow-md hover:bg-gray-100 transition">
                    📋 All Proposals
                </a>
                <a href="{{ route('proposals.index', ['shortlisted' => 1]) }}"
                   class="bg-cyan-700 text-white px-6 py-2 text-sm font-semibold rounded-full shadow-md hover:bg-cyan-800 transition">
                    ⭐ View Shortlisted
                </a>
            </div>
        @endcan

        <div class="overflow-x-auto rounded-lg shadow-lg">
            <table class="min-w-full text-sm text-left text-gray-800">
                <thead class="bg-teal-900 text-white uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Job ID</th>
                        <th class="px-6 py-3">Job Title</th>
                        <th class="px-6 py-3">Freelancer</th>
                        <th class="px-6 py-3">Bid Amount</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($proposals as $proposal)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-semibold">{{ $proposal->clientJob->id ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $proposal->clientJob->title ?? 'N/A' }}</td>
                            <td class="px-6 py-4">{{ $proposal->freelancer->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 font-medium text-green-700">${{ $proposal->bid_amount }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full 
                                    {{ $proposal->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                       ($proposal->status === 'accepted' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800') }}">
                                    {{ $proposal->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center space-y-2 sm:space-y-0 sm:space-x-2 flex flex-col sm:flex-row justify-center">
                                <a href="{{ route('proposals.show', $proposal) }}"
                                   class="bg-cyan-600 hover:bg-cyan-700 text-white text-xs px-4 py-1 rounded-full font-semibold shadow">
                                   View
                                </a>

                                @if (auth()->user()->isFreelancer() && $proposal->status == 'pending')
                                    <a href="{{ route('proposals.edit', $proposal) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white text-xs px-4 py-1 rounded-full font-semibold shadow">
                                       Edit
                                    </a>
                                @endif

                                @if (auth()->user()->isClient())
                                    <form action="{{ route('proposals.shortlist', $proposal) }}"
                                          method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="text-xs px-4 py-1 rounded-full font-semibold shadow 
                                                {{ $proposal->shortlisted ? 'bg-gray-400 text-white hover:bg-gray-500' : 'bg-green-500 text-white hover:bg-green-600' }}">
                                            {!! $proposal->shortlisted ? '✔️ Shortlisted' : '⭐ Shortlist' !!}
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
