@extends('backend.admin.master')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">👤 User Management</h1>
    <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
        <table class="min-w-full text-sm text-left text-gray-800">
            <thead class="bg-cyan-700 text-white text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Role</th>
                    <th class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-medium">{{ $user->id }}</td>
                        <td class="px-6 py-4">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4 capitalize">{{ $user->role }}</td>
                        <td class="px-6 py-4 text-center flex flex-wrap gap-2 justify-center">
                            <!-- Edit -->
                            <a href="{{ route('admin.useredit', $user->id) }}"
                               class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded-full text-xs font-semibold shadow transition">
                                ✏️ Edit
                            </a>

                            <!-- Ban (non-functional) -->
                            <button class="inline-flex items-center bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-3 py-1.5 rounded-full text-xs font-semibold shadow transition">
                                🚫 Ban
                            </button>

                            <!-- Delete -->
                            <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" id="delete-form-{{ $user->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                        onclick="confirmDelete({{ $user->id }})"
                                        class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-full text-xs font-semibold shadow transition">
                                    🗑️ Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Delete Confirmation Script -->
<script>
    function confirmDelete(userId) {
        if (confirm("Are you sure you want to delete this user?")) {
            document.getElementById('delete-form-' + userId).submit();
        }
    }
</script>
@endsection
