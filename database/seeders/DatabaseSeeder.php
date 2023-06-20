<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Sreekanth P',
            'email' => 'sree@sree.com',
            'password' => '12345'
        ]);


        \App\Models\User::factory(300)->create();

        $users = \App\Models\User::all()->shuffle();

        for ($i = 0; $i < 20; $i++) {
            \App\Models\Employer::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }
        $employers = \App\Models\Employer::all();

        for ($i = 0; $i < 100; $i++) {
            Job::factory()->create([
                'employer_id' => $employers->random()->id
            ]);
        }
        foreach ($users as $user) {
            $jobs = Job::inRandomOrder()->take(rand(0, 4))->get();

            foreach ($jobs as $job) {
                JobApplication::factory()->create([
                    'job_id' => $job->id,
                    'user_id' => $user->id
                ]);
            }
        }
    }
}