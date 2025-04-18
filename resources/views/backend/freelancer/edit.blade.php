@extends('backend.admin.master')

@section('content')
    <div class="min-h-screen  py-12 px-4 flex justify-center items-start">
        <div class="w-full max-w-2xl bg-gray-100 shadow-2xl rounded-xl p-8 md:p-10">

            <h2 class="text-3xl font-bold text-center text-[rgba(120,186,192,1)] mb-8">
                ✏️ Edit Freelancer Profile
            </h2>

            <form action="{{ route('freelancer.update', ['id' => $freelancerProfile->id]) }}" method="POST"
                  enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Profile Picture --}}
                <div class="text-center">
                    @php
                        $profilePicture = auth()->user()->profile_picture
                            ? asset('storage/' . auth()->user()->profile_picture)
                            : asset('images/default-avatar.jpg');
                    @endphp

                    <img id="previewImage" src="{{ $profilePicture }}" alt="Profile Picture"
                         class="w-28 h-28 rounded-full object-cover border-4 border-[rgba(120,186,192,1)] mx-auto shadow mb-3" />

                    <label class="block text-gray-700 font-medium mb-1">Change Profile Picture</label>
                    <input type="file" name="profile_picture" accept="image/*" onchange="previewFile(this)"
                           class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4
                                  file:rounded-full file:border-0 file:text-sm file:font-semibold
                                  file:bg-[rgba(120,186,192,0.1)] file:text-[rgba(120,186,192,1)] hover:file:bg-[rgba(120,186,192,0.2)]" />
                </div>

                {{-- Skills --}}
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Skills</label>
                    <textarea name="skills" required
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[rgba(120,186,192,1)] resize-y">
                        {{ old('skills', $freelancerProfile->skills) }}
                    </textarea>
                </div>

                {{-- Hourly Rate --}}
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Hourly Rate ($)</label>
                    <input type="number" name="hourly_rate" required
                           value="{{ old('hourly_rate', $freelancerProfile->hourly_rate) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[rgba(120,186,192,1)]" />
                </div>

                {{-- Availability --}}
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Availability</label>
                    <select name="availability" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[rgba(120,186,192,1)]">
                        <option value="available" {{ $freelancerProfile->availability == 'available' ? 'selected' : '' }}>
                            Available</option>
                        <option value="busy" {{ $freelancerProfile->availability == 'busy' ? 'selected' : '' }}>Busy</option>
                        <option value="offline" {{ $freelancerProfile->availability == 'offline' ? 'selected' : '' }}>
                            Offline</option>
                    </select>
                </div>

                {{-- Bio --}}
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Bio</label>
                    <textarea name="bio"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[rgba(120,186,192,1)] resize-y">
                        {{ old('bio', $freelancerProfile->bio) }}
                    </textarea>
                </div>

                {{-- Experience --}}
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Experience</label>
                    <input type="text" name="experience"
                           value="{{ old('experience', $freelancerProfile->experience) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[rgba(120,186,192,1)]" />
                </div>

                {{-- Portfolio --}}
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Portfolio Link</label>
                    <input type="url" name="portfolio_link"
                           value="{{ old('portfolio_link', $freelancerProfile->portfolio_link) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[rgba(120,186,192,1)]" />
                </div>

                {{-- Rating --}}
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Rating</label>
                    <input type="number" name="rating" step="0.1" min="0" max="5"
                           value="{{ old('rating', $freelancerProfile->rating) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[rgba(120,186,192,1)]" />
                </div>

                {{-- Buttons --}}
                <div class="flex justify-center gap-4 pt-6">
                    <button type="submit"
                            class="bg-[rgba(120,186,192,1)] hover:bg-[rgba(100,160,165,1)] text-white px-6 py-2 rounded-full transition font-semibold">
                        💾 Update Profile
                    </button>
                    <a href="{{ route('dashboard') }}"
                       class="border border-gray-400 text-gray-700 px-6 py-2 rounded-full hover:bg-gray-100 transition">
                        ⬅️ Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    {{-- Preview image script --}}
    <script>
        function previewFile(input) {
            const file = input.files[0];
            if (file) {
                const preview = document.getElementById('previewImage');
                preview.src = URL.createObjectURL(file);
            }
        }
    </script>
@endsection
