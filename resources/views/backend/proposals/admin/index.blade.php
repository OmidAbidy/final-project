@extends('backend.admin.master')

@section('content')
<h2>Admin: All Proposals</h2>
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Job</th>
      <th>Freelancer</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($proposals as $proposal)
    <tr>
      <td>{{ $proposal->proposal_id }}</td>
      <td>{{ $proposal->clientJob->title }}</td>
      <td>{{ $proposal->freelancer->name }}</td>
      <td>{{ ucfirst($proposal->status) }}</td>
      <td>
        <form action="{{ route('admin.proposals.updateStatus', $proposal) }}" method="POST" class="d-inline">
          @csrf
          <select name="status" class="form-select d-inline w-auto">
            <option value="pending" @if($proposal->status == 'pending') selected @endif>Pending</option>
            <option value="accepted" @if($proposal->status == 'accepted') selected @endif>Accepted</option>
            <option value="rejected" @if($proposal->status == 'rejected') selected @endif>Rejected</option>
          </select>
          <button type="submit" class="btn btn-sm btn-secondary">Update</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection