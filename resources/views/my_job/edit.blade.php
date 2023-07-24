<x-layout>
    <x-navigation :links="['My Jobs' => route('my_jobs.index'), 'Edit Job' => '#']" class="mb-4" />
    <x-card class="mb-8">
        <form action="{{ route('my_jobs.update', $job) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-4 mb-4 ">
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title" :value="$job->title" />
                </div>
                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location" :value="$job->location" />
                </div>
                <div class="col-span-2">
                    <x-label for="Salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number" :value="$job->salary" />
                </div>
                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input type="textarea" name="description" :value="$job->description" />
                </div>
                <div>
                    <x-label for="experience" :required="true">Experience</x-label>
                    <x-radio-group name="experience" :allOption="false" :value="$job->experience" :options="\App\Models\Job::$experience" />
                </div>
                <div>
                    <x-label for="category" :required="true">Category</x-label>
                    <x-radio-group name="category" :allOption="false" :value="$job->category" :options="\App\Models\Job::$category" />
                </div>
                <div class="col-span-2">
                    <x-button class="w-full">Edit job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
