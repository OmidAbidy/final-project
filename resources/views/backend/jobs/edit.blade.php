@extends('backend.admin.master')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4 text-primary">Edit Job: {{ $job->title }}</h2>

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

        <form action="{{ route('jobs.update', $job) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Left Column -->
                <div class="col-md-8">
                    {{-- Job Title --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Job Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ old('title', $job->title) }}" required>
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Job Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $job->description) }}</textarea>
                    </div>

                    {{-- Additional Terms --}}
                    <div class="mb-3">
                        <label for="terms" class="form-label">Additional Terms</label>
                        <textarea name="terms" id="terms" class="form-control">{{ old('terms', $job->terms) }}</textarea>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-4">
                    {{-- Category --}}
                    <div class="mb-3">
                        <label for="categorie_id" class="form-label">Category</label>
                        <select name="categorie_id" id="categorie_id" class="form-control" required>
                            <option value="">Select a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('categorie_id', $job->categorie_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Budget Type --}}
                    <div class="mb-3">
                        <label class="form-label">Budget Type</label>
                        <select name="budget_type" id="budget_type" class="form-control" required>
                            <option value="fixed" {{ old('budget_type', $job->budget_type) == 'fixed' ? 'selected' : '' }}>
                                Fixed</option>
                            <option value="hourly"
                                {{ old('budget_type', $job->budget_type) == 'hourly' ? 'selected' : '' }}>Hourly</option>
                        </select>
                    </div>

                    {{-- Budget Amount --}}
                    <div class="mb-3">
                        <label for="budget_amount" class="form-label">Budget Amount</label>
                        <input type="number" name="budget_amount" id="budget_amount" class="form-control"
                            value="{{ old('budget_amount', $job->budget_amount) }}">
                    </div>

                    {{-- Negotiable Checkbox --}}
                    <div class="mb-3">
                        <input type="hidden" name="is_negotiable" value="0">
                        <input type="checkbox" name="is_negotiable" id="is_negotiable" value="1"
                            {{ old('is_negotiable', $job->is_negotiable) ? 'checked' : '' }}>
                        <label for="is_negotiable">Negotiable</label>
                    </div>

                    {{-- Application Deadline --}}
                    <div class="mb-3">
                        <label for="application_deadline" class="form-label">Application Deadline</label>
                        <input type="date" name="application_deadline" id="application_deadline" class="form-control"
                            value="{{ old('application_deadline', $job->application_deadline->format('Y-m-d')) }}"
                            required>
                    </div>

                    {{-- Project Deadline --}}
                    <div class="mb-3">
                        <label for="project_deadline" class="form-label">Project Deadline</label>
                        <input type="date" name="project_deadline" id="project_deadline" class="form-control"
                            value="{{ old('project_deadline', $job->project_deadline ? $job->project_deadline->format('Y-m-d') : '') }}">
                    </div>

                    {{-- Visibility --}}
                    <div class="mb-3">
                        <label class="form-label">Visibility</label>
                        <select name="visibility" id="visibility" class="form-control" required>
                            <option value="public" {{ old('visibility', $job->visibility) == 'public' ? 'selected' : '' }}>
                                Public</option>
                            <option value="private"
                                {{ old('visibility', $job->visibility) == 'private' ? 'selected' : '' }}>Private</option>
                            <option value="invite_only"
                                {{ old('visibility', $job->visibility) == 'invite_only' ? 'selected' : '' }}>Invite Only
                            </option>
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="open" {{ old('status', $job->status) == 'open' ? 'selected' : '' }}>Open
                            </option>
                            <option value="in_progress"
                                {{ old('status', $job->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="closed" {{ old('status', $job->status) == 'closed' ? 'selected' : '' }}>Closed
                            </option>
                        </select>
                    </div>

                    {{-- Location --}}
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" name="location" id="location" class="form-control"
                            value="{{ old('location', $job->location) }}" required>
                    </div>

                    {{-- Experience Level --}}
                    <div class="mb-3">
                        <label class="form-label">Experience Level</label>
                        <select name="experience_level" id="experience_level" class="form-control" required>
                            <option value="entry"
                                {{ old('experience_level', $job->experience_level) == 'entry' ? 'selected' : '' }}>Entry
                            </option>
                            <option value="intermediate"
                                {{ old('experience_level', $job->experience_level) == 'intermediate' ? 'selected' : '' }}>
                                Intermediate</option>
                            <option value="expert"
                                {{ old('experience_level', $job->experience_level) == 'expert' ? 'selected' : '' }}>Expert
                            </option>
                        </select>
                    </div>

                    {{-- Payment Method --}}
                    <div class="mb-3">
                        <label class="form-label">Payment Method</label>
                        <select name="payment_method" id="payment_method" class="form-control" required>
                            <option value="escrow"
                                {{ old('payment_method', $job->payment_method) == 'escrow' ? 'selected' : '' }}>Escrow
                            </option>
                            <option value="milestone"
                                {{ old('payment_method', $job->payment_method) == 'milestone' ? 'selected' : '' }}>
                                Milestone</option>
                            <option value="on_completion"
                                {{ old('payment_method', $job->payment_method) == 'on_completion' ? 'selected' : '' }}>On
                                Completion</option>
                        </select>
                    </div>

                    {{-- Hires Needed --}}
                    <div class="mb-3">
                        <label for="hires_needed" class="form-label">Number of Freelancers Needed</label>
                        <input type="number" name="hires_needed" id="hires_needed" class="form-control"
                            value="{{ old('hires_needed', $job->hires_needed) }}" required min="1">
                    </div>
                </div>
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="btn btn-primary w-100">Update Job</button>
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
