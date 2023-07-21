<x-layout>
    <x-navigation :links="['My Jobs' => route('my_jobs.index'), 'Create' => '#']" class="mb-4" />
    <x-card class="mb-8">
        <form action="{{ route('my_jobs.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-4 mb-4 ">
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title" />
                </div>
                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location" />
                </div>
                <div class="col-span-2">
                    <x-label for="Salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number" />
                </div>
                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input type="textarea" name="description" />
                </div>
                <div>
                    <x-label for="experience" :required="true">Experience</x-label>
                    <x-radio-group name="experience" :allOption="false" :value="old('experience')" :options="\App\Models\Job::$experience" />
                </div>
                <div>
                    <x-label for="category" :required="true">Category</x-label>
                    <x-radio-group name="category" :allOption="false" :value="old('category')" :options="\App\Models\Job::$category" />
                </div>
                <div class="col-span-2">
                    <x-button class="w-full">Create job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
