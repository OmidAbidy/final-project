<!-- resources/views/backend/proposals/components/status-form.blade.php -->
<form action="{{ route('proposals.updateStatus', $proposal->proposal_id) }}" method="POST" class="mt-3">
    @csrf
    @method('PUT')
    
    <label for="status" class="form-label">Update Proposal Status:</label>
    <select name="status" id="status" class="form-select mb-2" required>
        <option value="">Select Status</option>
        <option value="accepted" {{ $proposal->status === 'accepted' ? 'selected' : '' }}>Accept</option>
        <option value="rejected" {{ $proposal->status === 'rejected' ? 'selected' : '' }}>Reject</option>
    </select>

    <button type="submit" class="btn btn-primary btn-sm">Update Status</button>
</form>
