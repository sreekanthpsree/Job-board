<x-layout>
    <x-navigation :links="['Jobs' => route('jobs.index')]" class="mb-4">
    </x-navigation>
    <x-card class="mb-4 text-sm">
        <form action="{{ route('jobs.index') }}" method="GET">
            <div class="grid mb-4 grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">
                        Search
                    </div>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Search for any text">
                    </x-text-input>
                </div>
                <div>
                    <div class="mb-1 font-semibold">
                        Salary
                    </div>
                    <div class="flex gap-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From">
                        </x-text-input>
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To">
                        </x-text-input>
                    </div>
                </div>
                <div>3</div>
                <div>4</div>
            </div>
            <button class="w-full">Filter</button>
        </form>
    </x-card>
    @foreach ($jobs as $job)
        <x-job-card :$job>
            <x-link-button :href="route('jobs.show', $job)">Show</x-link-button>
        </x-job-card>
    @endforeach
</x-layout>
