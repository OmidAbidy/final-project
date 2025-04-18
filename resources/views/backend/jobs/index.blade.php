@extends('backend.admin.master')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8 min-h-screen">
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
        <h2 class="text-3xl font-semibold text-cyan-600">
            {{ auth()->user()->role === 'admin' ? 'Admin - All Jobs' : 'My Jobs' }}
        </h2>

        @can('isclient')
        <a href="{{ route('jobs.create') }}" class="inline-flex items-center gap-2 bg-amber-500 text-white px-5 py-2 rounded-md shadow-md hover:bg-amber-600 transition-all">
            <i class="fas fa-plus"></i> Post New Job
        </a>
        @endcan
    </div>

    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class=" bg-[rgba(120,186,192,0.7)] text-white text-center py-5 rounded-t-2xl">
            <h4 class="text-xl font-semibold">📋 Posted Jobs</h4>
        </div>

        <div class="p-6 overflow-x-auto">
            @if($jobs->isEmpty())
            <div class="bg-yellow-100 text-yellow-800 p-4 text-center rounded-md">
                No jobs posted yet.
            </div>
            @else
            <table class="w-full min-w-[800px] text-sm text-center border-separate border-spacing-y-2">
                <thead class="bg-slate-100 text-slate-700">
                    <tr>
                        <th class="py-3 px-4 rounded-l-lg">ID</th>
                        <th class="py-3 px-4 text-left">Title</th>
                        <th class="py-3 px-4">Category</th>
                        <th class="py-3 px-4">Budget</th>
                        <th class="py-3 px-4">Deadline</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4 rounded-r-lg">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                    <tr class="bg-white shadow hover:shadow-lg transition-all rounded-md">
                        <td class="py-3 px-4 font-semibold">{{ $job->id }}</td>
                        <td class="py-3 px-4 text-left">
                            <div class="text-cyan-600 font-medium">{{ $job->title }}</div>
                            <p class="text-slate-500 text-xs">{{ Str::limit($job->description, 80) }}</p>
                        </td>
                        <td class="py-3 px-4 text-slate-600">{{ $job->category->name ?? 'N/A' }}</td>
                        <td class="py-3 px-4">
                            <span class="font-bold text-green-600">${{ number_format($job->budget_amount, 2) }}</span>
                            @if($job->budget_type === 'hourly')
                            <span class="text-sm text-slate-500">/hr</span>
                            @endif
                            @if($job->is_negotiable)
                            <span class="ml-2 inline-block bg-yellow-200 text-yellow-800 text-xs px-2 py-1 rounded-full">Negotiable</span>
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            <div class="font-medium text-slate-800">{{ $job->application_deadline->format('M d, Y') }}</div>
                            <small class="text-slate-500">{{ $job->application_deadline->diffForHumans() }}</small>
                        </td>
                        <td class="py-3 px-4">
                            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                @if($job->status === 'open') bg-green-100 text-green-700
                                @elseif($job->status === 'in_progress') bg-blue-100 text-blue-700
                                @elseif($job->status === 'completed') bg-gray-200 text-gray-700
                                @else bg-red-100 text-red-700
                                @endif">
                                {{ Str::title(str_replace('_', ' ', $job->status)) }}
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            <div class="flex justify-center gap-2">
                                @can('isadmin')
                                <a href="{{ route('jobs.edit', $job) }}" class="text-amber-500 hover:text-amber-600" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('jobs.destroy', $job) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @elseif(auth()->user()->can('isclient'))
                                <a href="{{ route('jobs.edit', $job) }}" class="text-amber-500 hover:text-amber-600" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('jobs.destroy', $job) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                <a href="{{ route('jobs.show', $job) }}" class="text-blue-500 hover:text-blue-600" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @elseif(auth()->user()->can('isfreelancer'))
                                <a href="{{ route('freelancer.jobs.show', $job) }}" class="text-blue-500 hover:text-blue-600" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            {{-- <div class="mt-6 flex justify-center">
                {{ $jobs->links() }}
            </div> --}}
            @endif
        </div>
    </div>
</div>
@endsection
