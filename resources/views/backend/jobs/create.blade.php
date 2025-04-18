@extends('backend.admin.master')

@section('content')
<div class="max-w-7xl mx-auto p-6 md:p-10 bg-[rgba(120,186,192,0.7)] rounded-xl shadow-lg">

    <h2 class="text-3xl font-bold text-white mb-8 text-center">Create a New Job</h2>

    {{-- Display Validation Errors --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 border-l-4 border-red-500 p-4 rounded mb-6">
            <strong class="font-semibold">Oops!</strong>
            <ul class="mt-2 list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Left Column -->
            <div class="space-y-6">
                <div>
                    <label for="title" class="block text-white font-medium mb-1">Job Title</label>
                    <input type="text" name="title" id="title" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-white" required>
                </div>

                <div>
                    <label for="description" class="block text-white font-medium mb-1">Job Description</label>
                    <textarea name="description" id="description" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-white" required></textarea>
                </div>

                <div>
                    <label for="terms" class="block text-white font-medium mb-1">Additional Terms</label>
                    <textarea name="terms" id="terms" rows="3" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-white"></textarea>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <div>
                    <label for="categorie_id" class="block text-white font-medium mb-1">Category</label>
                    <select name="categorie_id" id="categorie_id" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-white" required>
                        <option value="">Select a Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="budget_type" class="block text-white font-medium mb-1">Budget Type</label>
                    <select name="budget_type" id="budget_type" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-white" required>
                        <option value="fixed">Fixed</option>
                        <option value="hourly">Hourly</option>
                    </select>
                </div>

                <div>
                    <label for="budget_amount" class="block text-white font-medium mb-1">Budget Amount</label>
                    <input type="number" name="budget_amount" id="budget_amount" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-white">
                </div>

                <div class="flex items-center gap-2">
                    <input type="hidden" name="is_negotiable" value="0">
                    <input type="checkbox" name="is_negotiable" id="is_negotiable" value="1" class="accent-white">
                    <label for="is_negotiable" class="text-white">Negotiable</label>
                </div>

                <div>
                    <label for="application_deadline" class="block text-white font-medium mb-1">Application Deadline</label>
                    <input type="date" name="application_deadline" id="application_deadline" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-white" required>
                </div>

                <div>
                    <label for="project_deadline" class="block text-white font-medium mb-1">Project Deadline</label>
                    <input type="date" name="project_deadline" id="project_deadline" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-white">
                </div>

                <div>
                    <label for="visibility" class="block text-white font-medium mb-1">Visibility</label>
                    <select name="visibility" id="visibility" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-white" required>
                        <option value="public">Public</option>
                        <option value="private">Private</option>
                        <option value="invite_only">Invite Only</option>
                    </select>
                </div>

                <div>
                    <label for="location" class="block text-white font-medium mb-1">Location</label>
                    <input type="text" name="location" id="location" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-white" required>
                </div>

                <div>
                    <label for="experience_level" class="block text-white font-medium mb-1">Experience Level</label>
                    <select name="experience_level" id="experience_level" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-white" required>
                        <option value="entry">Entry</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="expert">Expert</option>
                    </select>
                </div>

                <div>
                    <label for="payment_method" class="block text-white font-medium mb-1">Payment Method</label>
                    <select name="payment_method" id="payment_method" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-white" required>
                        <option value="escrow">Escrow</option>
                        <option value="milestone">Milestone</option>
                        <option value="on_completion">On Completion</option>
                    </select>
                </div>

                <div>
                    <label for="hires_needed" class="block text-white font-medium mb-1">Freelancers Needed</label>
                    <input type="number" name="hires_needed" id="hires_needed" min="1" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-white" required>
                </div>
            </div>
        </div>

        {{-- Submit Button --}}
        <div class="pt-6">
            <button type="submit" class="w-full md:w-auto bg-white text-teal-700 hover:bg-teal-100 font-semibold py-3 px-6 rounded-lg transition-all duration-200">
                Post Job
            </button>
        </div>
    </form>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const appDeadline = document.getElementById('application_deadline');
        const projectDeadline = document.getElementById('project_deadline');

        appDeadline.addEventListener('change', function () {
            projectDeadline.min = this.value;
            if (projectDeadline.value && projectDeadline.value < this.value) {
                projectDeadline.value = '';
            }
        });
    });
</script>
@endsection
@endsection
