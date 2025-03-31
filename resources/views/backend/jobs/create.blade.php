@extends('backend.admin.master')


@section('content')
<div class="container">
    <h2>Create a New Job</h2>

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

    <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Job Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Job Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        {{-- Category --}}
        <div class="mb-3">
            <label for="categorie_id" class="form-label">Category</label>
            <select name="categorie_id" id="categorie_id" class="form-control" required>
                <option value="">Select a Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label for="description" class="form-label">Job Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        {{-- Budget Type --}}
        <div class="mb-3">
            <label class="form-label">Budget Type</label>
            <select name="budget_type" id="budget_type" class="form-control" required>
                <option value="fixed">Fixed</option>
                <option value="hourly">Hourly</option>
            </select>
        </div>

        {{-- Budget Amount (only for fixed) --}}
        <div class="mb-3">
            <label for="budget_amount" class="form-label">Budget Amount</label>
            <input type="number" name="budget_amount" id="budget_amount" class="form-control">
        </div>

        {{-- Negotiable Checkbox --}}
        <div class="mb-3">
            <input type="hidden" name="is_negotiable" value="0">
            <input type="checkbox" name="is_negotiable" id="is_negotiable" value="1">
            <label for="is_negotiable">Negotiable</label>
        </div>

        {{-- Application Deadline --}}
        <div class="mb-3">
            <label for="application_deadline" class="form-label">Application Deadline</label>
            <input type="date" name="application_deadline" id="application_deadline" class="form-control" required>
        </div>

        {{-- Project Deadline --}}
        <div class="mb-3">
            <label for="project_deadline" class="form-label">Project Deadline</label>
            <input type="date" name="project_deadline" id="project_deadline" class="form-control">
        </div>

        {{-- Visibility --}}
        <div class="mb-3">
            <label class="form-label">Visibility</label>
            <select name="visibility" id="visibility" class="form-control" required>
                <option value="public">Public</option>
                <option value="private">Private</option>
                <option value="invite_only">Invite Only</option>
            </select>
        </div>

        {{-- Location --}}
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>

        {{-- Experience Level --}}
        <div class="mb-3">
            <label class="form-label">Experience Level</label>
            <select name="experience_level" id="experience_level" class="form-control" required>
                <option value="entry">Entry</option>
                <option value="intermediate">Intermediate</option>
                <option value="expert">Expert</option>
            </select>
        </div>

        {{-- Payment Method --}}
        <div class="mb-3">
            <label class="form-label">Payment Method</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option value="escrow">Escrow</option>
                <option value="milestone">Milestone</option>
                <option value="on_completion">On Completion</option>
            </select>
        </div>

        {{-- Hires Needed --}}
        <div class="mb-3">
            <label for="hires_needed" class="form-label">Number of Freelancers Needed</label>
            <input type="number" name="hires_needed" id="hires_needed" class="form-control" required min="1">
        </div>

        {{-- Terms --}}
        <div class="mb-3">
            <label for="terms" class="form-label">Additional Terms</label>
            <textarea name="terms" id="terms" class="form-control"></textarea>
        </div>

        {{-- Attachments --}}
        <div class="mb-3">
            <label for="attachments" class="form-label">Attachments</label>
            <input type="file" name="attachments[]" id="attachments" class="form-control" multiple>
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="btn btn-primary">Post Job</button>
    </form>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set project deadline min date based on application deadline
        const appDeadline = document.getElementById('application_deadline');
        const projectDeadline = document.getElementById('project_deadline');
        
        appDeadline.addEventListener('change', function() {
            projectDeadline.min = this.value;
            if (projectDeadline.value && projectDeadline.value < this.value) {
                projectDeadline.value = '';
            }
        });
    });
</script>
@endsection
@endsection

