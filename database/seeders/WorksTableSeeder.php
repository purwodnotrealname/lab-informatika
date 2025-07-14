<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Work;

class WorksTableSeeder extends Seeder
{
    public function run()
    {
        Work::create([
            'title' => 'First Project',
            'description' => 'This is the description for the first project',
            'user_id' => 1,
            'source' => 'https://example.com/project1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Work::create([
            'title' => 'Second Project',
            'description' => 'Description for the second project goes here',
            'user_id' => 1,
            'source' => 'https://example.com/project2',
            'created_at' => now()->subDay(),
            'updated_at' => now()->subDay(),
        ]);

        // Add more sample data as needed
    }
}