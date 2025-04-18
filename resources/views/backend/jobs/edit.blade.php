@extends('backend.admin.master')

@section('content')
    <div class="container mx-auto px-6 py-10 max-w-7xl">

        <!-- Page Title -->
        <h2 class="text-3xl font-extrabold text-teal-600 mb-8">Edit Job: {{ $job->title }}</h2>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-6 py-4 mb-8 rounded-lg shadow-md">
                <strong class="block mb-2 text-lg font-semibold">There were some problems with your input:</strong>
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('jobs.update', $job) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Main Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column -->
                <div class="lg:col-span-2 space-y-8 bg-[rgba(165,210,214,0.7)] p-8 rounded-lg shadow-lg">
                    <!-- Job Title -->
                    <div class="space-y-2">
                        <label for="title" class="text-lg font-medium text-gray-700">Job Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $job->title) }}"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-teal-600 focus:border-teal-600 text-lg"
                            required>
                    </div>

                    <!-- Job Description -->
                    <div class="space-y-2">
                        <label for="description" class="text-lg font-medium text-gray-700">Job Description</label>
                        <textarea name="description" id="description" rows="6"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-teal-600 focus:border-teal-600 text-lg"
                            required>{{ old('description', $job->description) }}</textarea>
                    </div>

                    <!-- Additional Terms -->
                    <div class="space-y-2">
                        <label for="terms" class="text-lg font-medium text-gray-700">Additional Terms</label>
                        <textarea name="terms" id="terms" rows="4"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-teal-600 focus:border-teal-600 text-lg">{{ old('terms', $job->terms) }}</textarea>
                    </div>



                    <!-- Submit Button -->
                    <div class="flex justify-center align-items-center gap-4 mt-6">
                        <!-- Back Button -->
                        <a href="{{ url()->previous() }}"
                            class="inline-flex items-center gap-3 text-white bg-teal-600 hover:bg-teal-700 px-6 py-3 rounded-full shadow-lg transform transition-all duration-300 hover:scale-105">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="bg-teal-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:bg-teal-700 transition-all duration-300 transform hover:scale-105">
                            Update Job
                        </button>
                    </div>

                </div>

                <!-- Right Column -->
                <div class="space-y-8 bg-[rgba(167,207,210,0.7)] p-8 rounded-lg shadow-lg">
                    <!-- Category -->
                    <div class="space-y-2">
                        <label for="categorie_id" class="text-lg font-medium text-gray-700">Category</label>
                        <select name="categorie_id" id="categorie_id"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-teal-600 focus:border-teal-600 text-lg"
                            required>
                            <option value="">Select a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('categorie_id', $job->categorie_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Budget Type -->
                    <div class="space-y-2">
                        <label for="budget_type" class="text-lg font-medium text-gray-700">Budget Type</label>
                        <select name="budget_type" id="budget_type"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-teal-600 focus:border-teal-600 text-lg"
                            required>
                            <option value="fixed"
                                {{ old('budget_type', $job->budget_type) == 'fixed' ? 'selected' : '' }}>Fixed</option>
                            <option value="hourly"
                                {{ old('budget_type', $job->budget_type) == 'hourly' ? 'selected' : '' }}>Hourly</option>
                        </select>
                    </div>

                    <!-- Budget Amount -->
                    <div class="space-y-2">
                        <label for="budget_amount" class="text-lg font-medium text-gray-700">Budget Amount</label>
                        <input type="number" name="budget_amount" id="budget_amount"
                            value="{{ old('budget_amount', $job->budget_amount) }}"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-teal-600 focus:border-teal-600 text-lg">
                    </div>

                    <!-- Negotiable Checkbox -->
                    <div class="flex items-center gap-2">
                        <input type="hidden" name="is_negotiable" value="0">
                        <input type="checkbox" name="is_negotiable" id="is_negotiable" value="1"
                            class="accent-teal-600" {{ old('is_negotiable', $job->is_negotiable) ? 'checked' : '' }}>
                        <label for="is_negotiable" class="text-gray-700 text-lg">Negotiable</label>
                    </div>

                    <!-- Application Deadline -->
                    <div class="space-y-2">
                        <label for="application_deadline" class="text-lg font-medium text-gray-700">Application
                            Deadline</label>
                        <input type="date" name="application_deadline" id="application_deadline"
                            value="{{ old('application_deadline', $job->application_deadline->format('Y-m-d')) }}"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-teal-600 focus:border-teal-600 text-lg"
                            required>
                    </div>

                    <!-- Project Deadline -->
                    <div class="space-y-2">
                        <label for="project_deadline" class="text-lg font-medium text-gray-700">Project Deadline</label>
                        <input type="date" name="project_deadline" id="project_deadline"
                            value="{{ old('project_deadline', $job->project_deadline ? $job->project_deadline->format('Y-m-d') : '') }}"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-teal-600 focus:border-teal-600 text-lg">
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <label for="status" class="text-lg font-medium text-gray-700">Status</label>
                        <select name="status" id="status"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-teal-600 focus:border-teal-600 text-lg"
                            required>
                            <option value="open" {{ old('status', $job->status) == 'open' ? 'selected' : '' }}>Open
                            </option>
                            <option value="in_progress"
                                {{ old('status', $job->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="closed" {{ old('status', $job->status) == 'closed' ? 'selected' : '' }}>Closed
                            </option>
                        </select>
                    </div>

                    <!-- Location -->
                    <div class="space-y-2">
                        <label for="location" class="text-lg font-medium text-gray-700">Location</label>
                        <input type="text" name="location" id="location"
                            value="{{ old('location', $job->location) }}"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-teal-600 focus:border-teal-600 text-lg"
                            required>
                    </div>

                    <!-- Experience Level -->
                    <div class="space-y-2">
                        <label for="experience_level" class="text-lg font-medium text-gray-700">Experience Level</label>
                        <select name="experience_level" id="experience_level"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-teal-600 focus:border-teal-600 text-lg"
                            required>
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

                    <!-- Payment Method -->
                    <div class="space-y-2">
                        <label for="payment_method" class="text-lg font-medium text-gray-700">Payment Method</label>
                        <select name="payment_method" id="payment_method"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-teal-600 focus:border-teal-600 text-lg"
                            required>
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

                    <!-- Hires Needed -->
                    <div class="space-y-2">
                        <label for="hires_needed" class="text-lg font-medium text-gray-700">Number of Freelancers
                            Needed</label>
                        <input type="number" name="hires_needed" id="hires_needed"
                            value="{{ old('hires_needed', $job->hires_needed) }}" min="1"
                            class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-teal-600 focus:border-teal-600 text-lg"
                            required>
                    </div>
                </div>
            </div>


        </form>
    </div>

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
