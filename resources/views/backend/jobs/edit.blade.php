@extends('backend.admin.master')


@section('content')
<div class="container mt-4 p-4 bg-light shadow-lg rounded">
       {{-- Display Validation Errors --}}
       @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif
   
    <h2 class="mb-4">Edit Job</h2>
    <form action="{{ route('jobs.update', $job->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label class="form-label">Title:</label>
            <input type="text" name="title" value="{{ old('title', $job->title) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Category:</label>
            <select name="categorie_id" class="form-select" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $job->categorie_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Description:</label>
            <textarea name="description" class="form-control" required>{{ old('description', $job->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Budget Type:</label>
            <select name="budget_type" class="form-select">
                <option value="fixed" {{ $job->budget_type == 'fixed' ? 'selected' : '' }}>Fixed</option>
                <option value="hourly" {{ $job->budget_type == 'hourly' ? 'selected' : '' }}>Hourly</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Budget Amount:</label>
            <input type="number" name="budget_amount" value="{{ old('budget_amount', $job->budget_amount) }}" class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Application Deadline:</label>
            <input type="date" name="application_deadline" value="{{ old('application_deadline', $job->application_deadline) }}" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Project Deadline:</label>
            <input type="date" name="project_deadline" value="{{ old('project_deadline', $job->project_deadline) }}" class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Status:</label>
            <select name="status" class="form-select">
                <option value="open" {{ $job->status == 'open' ? 'selected' : '' }}>Open</option>
                <option value="in_progress" {{ $job->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $job->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $job->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Location:</label>
            <input type="text" name="location" value="{{ old('location', $job->location) }}" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Hires Needed:</label>
            <input type="number" name="hires_needed" value="{{ old('hires_needed', $job->hires_needed) }}" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Payment Method:</label>
            <select name="payment_method" class="form-select" required>
                <option value="escrow">Escrow</option>
                <option value="milestone">Milestone</option>
                <option value="on_completion">On Completion</option>
             </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Visibility:</label>
            <select name="visibility" class="form-select" required>
                <option value="public" {{ $job->visibility == 'public' ? 'selected' : '' }}>Public</option>
                <option value="private" {{ $job->visibility == 'private' ? 'selected' : '' }}>Private</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Terms:</label>
            <textarea name="terms" class="form-control">{{ old('terms', $job->terms) }}</textarea>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Attachments:</label>
            <input type="file" name="attachments[]" multiple class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Experience Level:</label>
            <select name="experience_level" class="form-select">
                <option value="entry" {{ $job->experience_level == 'entry' ? 'selected' : '' }}>Entry Level</option>
                <option value="intermediate" {{ $job->experience_level == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                <option value="expert" {{ $job->experience_level == 'expert' ? 'selected' : '' }}>Expert</option>
            </select>
        </div>

        {{-- <div class="mb-3">
            <label class="form-label">Skills Required:</label>
            <input type="text" name="skills_required" value="{{ old('skills_required', $job->skills_required) }}" class="form-control" required>
        </div> --}}

        <button type="submit" class="btn btn-primary">Update Job</button>
    </form>
</div>
@endsection
