@extends('backend.admin.master')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">Create Client Profile</h2>

    <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company Name</label>
            <input type="text" name="company_name" class="mt-1 block w-full px-4 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md text-gray-900 dark:text-white" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company Description</label>
            <textarea name="company_description" rows="4" class="mt-1 block w-full px-4 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md text-gray-900 dark:text-white"></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Website</label>
            <input type="url" name="website_name" class="mt-1 block w-full px-4 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md text-gray-900 dark:text-white">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Industry</label>
            <input type="text" name="industry" class="mt-1 block w-full px-4 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md text-gray-900 dark:text-white">
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Profile Picture (optional)</label>
            <input type="file" name="profile_picture" accept="image/*" class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
        </div>

        <button type="submit" class="w-full py-2 px-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-md shadow">Create Profile</button>
    </form>
</div>
@endsection
