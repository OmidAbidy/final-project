@extends('backend.admin.master')

@section('content')
<div class="flex justify-center py-12 px-4">
    <div class="w-full max-w-2xl bg-[rgba(166,218,223,0.7)] rounded-2xl shadow-xl p-8">

        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">✏️ Edit Proposal</h2>

        {{-- ✅ UPDATE FORM --}}
        <form action="{{ route('proposals.update', $proposal) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Include your proposal fields --}}
            @include('backend.proposals.partials._form', ['proposal' => $proposal])

            <div class="text-center">
                <button type="submit"
                        class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-6 py-2 rounded-full transition shadow">
                    ✅ Update Proposal
                </button>
            </div>
        </form>

        {{-- ✅ WITHDRAW FORM --}}
        <form action="{{ route('proposals.destroy', $proposal) }}" method="POST"
              class="mt-6 text-center"
              onsubmit="return confirm('Are you sure you want to withdraw this proposal?');">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded-full transition shadow">
                🗑️ Withdraw Proposal
            </button>
        </form>

    </div>
</div>
@endsection
