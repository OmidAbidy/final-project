@extends('backend.admin.master')

@section('content')
<div class="min-h-screen py-12 px-4 flex justify-center items-start">
    <div class="w-full max-w-2xl bg-white shadow-2xl rounded-xl p-8 md:p-10">

        <h2 class="text-3xl font-bold text-center text-[rgba(120,186,192,1)] mb-8">
            + Create Freelancer Profile
        </h2>

        <form action="{{ route('freelancer.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Profile Picture --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Profile Picture</label>
                <input type="file" name="profile_picture"
                       class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4
                       file:rounded-full file:border-0 file:text-sm file:font-semibold
                       file:bg-[rgba(120,186,192,0.1)] file:text-[rgba(120,186,192,1)] hover:file:bg-[rgba(120,186,192,0.2)]
                       cursor-pointer" />
            </div>

            {{-- Skills --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Skills</label>
                <textarea name="skills" required
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[rgba(120,186,192,1)] focus:outline-none resize-y"></textarea>
            </div>

            {{-- Hourly Rate --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Hourly Rate ($)</label>
                <input type="number" name="hourly_rate" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[rgba(120,186,192,1)] focus:outline-none" />
            </div>

            {{-- Availability --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Availability</label>
                <select name="availability" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[rgba(120,186,192,1)] focus:outline-none">
                    <option value="available">Available</option>
                    <option value="busy">Busy</option>
                    <option value="offline">Offline</option>
                </select>
            </div>

            {{-- Bio --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Bio</label>
                <textarea name="bio"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[rgba(120,186,192,1)] focus:outline-none resize-y"></textarea>
            </div>

            {{-- Experience --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Experience</label>
                <input type="text" name="experience"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[rgba(120,186,192,1)] focus:outline-none" />
            </div>

            {{-- Portfolio Link --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Portfolio Link</label>
                <input type="url" name="portfolio_link"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[rgba(120,186,192,1)] focus:outline-none" />
            </div>

            {{-- Rating --}}
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Rating (0 - 5)</label>
                <input type="number" name="rating" min="0" max="5" step="0.1"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[rgba(120,186,192,1)] focus:outline-none" />
            </div>

            {{-- Submit Button --}}
            <div class="text-center pt-6">
                <button type="submit"
                        class="bg-[rgba(120,186,192,1)] hover:bg-[rgba(100,160,165,1)] text-white font-semibold px-6 py-2 rounded-full transition">
                    ✅ Save Profile
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
