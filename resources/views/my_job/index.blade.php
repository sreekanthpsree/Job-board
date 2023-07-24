<x-layout>
    <x-navigation :links="['My Jobs' => '#']" class="mb-4"></x-navigation>
    <div class="mb-4 text-right">
        <x-link-button href="{{ route('my_jobs.create') }}">Add New</x-link-button>
    </div>
    @forelse ($jobs as $job)
        <x-job-card :$job>
            <div class="text-xs text-slate-500">
                @forelse ($job->jobApplications as $application)
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <div>{{ $application->user->name }}</div>
                            <div>Applied {{ $application->created_at->diffForHumans() }}</div>
                            <div>Download CV</div>
                        </div>
                        <div>
                            <div>
                                ₹{{ number_format($application->expected_salary) }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="mb-4">No applications yet</div>
                @endforelse
                @if (!$job->deleted_at)
                    <div class="flex space-x-2">
                        <x-link-button href="{{ route('my_jobs.edit', $job) }}">
                            Edit
                        </x-link-button>
                        <form class="flex space-x-2" action="{{ route('my_jobs.destroy', $job) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button>Delete</x-button>
                        </form>
                    </div>
                @else
                    <form class="flex space-x-2" action="{{ route('my_jobs.restore', $job) }}" method="post">
                        @csrf
                        {{-- @method('PUT') --}}
                        <x-button>Restore</x-button>
                    </form>
                @endif
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                No jobs yet
            </div>
            <div class="text-center">
                Post your first Job <a class="text-indigo-500 hover:underline"
                    href="{{ route('my_jobs.create') }}">here!</a>
            </div>
        </div>
    @endforelse
</x-layout>
