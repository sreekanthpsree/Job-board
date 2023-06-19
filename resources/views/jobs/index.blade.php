<x-layout>
    <x-navigation :links="['Jobs' => route('jobs.index')]" class="mb-4">
    </x-navigation>
    <x-card class="mb-4 text-sm" x-data=''>
        <form x-ref="filters" action="{{ route('jobs.index') }}" method="GET">
            <div class="grid mb-4 grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">
                        Search
                    </div>
                    <x-text-input name="search" value="{{ request('search') }}" form-ref="filters"
                        placeholder="Search for any text">
                    </x-text-input>
                </div>
                <div>
                    <div class="mb-1 font-semibold">
                        Salary
                    </div>
                    <div class="flex gap-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}" form-ref="filters"
                            placeholder="From">
                        </x-text-input>
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}" form-ref="filters"
                            placeholder="To">
                        </x-text-input>
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">
                        Experience
                    </div>
                    <x-radio-group name="experience" :options="\App\Models\Job::$experience"></x-radio-group>
                </div>
                <div>
                    <div class="mb-1 font-semibold">
                        Salary
                    </div>
                    <x-radio-group name="category" :options="\App\Models\Job::$category"></x-radio-group>
                </div>
            </div>
            <x-button class="w-full">Filter</x-button>
        </form>
    </x-card>
    @foreach ($jobs as $job)
        <x-job-card :$job>
            <x-link-button :href="route('jobs.show', $job)">Show</x-link-button>
        </x-job-card>
    @endforeach
</x-layout>
