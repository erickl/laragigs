<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@mail.com'
        ]);

        Listing::factory(5)->create([
            'user_id' => $user->id
        ]);
    
        // Listing::create([
        //     'title' => 'Title1',
        //     'tags' => 'Tag1',
        //     'company' => 'Company1',
        //     'location' => 'Location1',
        //     'email' => 'Email1',
        //     'website' => 'Website1',
        //     'description' => 'Description1'
        // ]);
    }
}
