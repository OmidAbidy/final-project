@extends('backend.admin.master')

@section('content')

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<h2>Submit Proposal</h2>
<form action="{{ route('proposals.store') }}" method="POST">
  @csrf
  @include('backend.proposals.partials._form')
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
