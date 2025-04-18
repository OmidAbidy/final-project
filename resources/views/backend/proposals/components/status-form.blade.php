{{-- resources/views/backend/proposals/components/status-form.blade.php --}}
<div class="bg-white p-6 rounded-xl shadow-md mt-6 w-full max-w-md mx-auto">
    <form action="{{ route('proposals.updateStatus', $proposal->proposal_id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <label for="status" class="block text-gray-700 font-semibold">Update Proposal Status:</label>
        <select name="status" id="status"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                required>
            <option value="">Select Status</option>
            <option value="accepted" {{ $proposal->status === 'accepted' ? 'selected' : '' }}>Accept</option>
            <option value="rejected" {{ $proposal->status === 'rejected' ? 'selected' : '' }}>Reject</option>
        </select>

        <div class="text-center">
            <button type="submit"
                    class="bg-[rgba(120,186,192,0.7)] hover:bg-cyan-700 text-white px-5 py-2 rounded-full transition">
                Update Status
            </button>
        </div>
    </form>
</div>
