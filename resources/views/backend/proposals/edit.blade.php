@extends('backend.admin.master')
@section('content')
<h2>Edit Proposal</h2>
<form action="{{ route('proposals.update', $proposal) }}" method="POST">
  @csrf
  @method('PUT')
  @include('backend.proposals.partials._form', ['proposal' => $proposal])
  <button type="submit" class="btn btn-primary">Update</button>
  <form action="{{ route('proposals.destroy', $proposal) }}" method="POST" onsubmit="return confirm('Are you sure you want to withdraw this proposal?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Withdraw Proposal</button>
</form>
</form>
@endsection