<?php

namespace Database\Seeders;

use App\Enums\PostStatus;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $user = User::create([
            'name' => 'Test User',
            'email' => 'test2@example.com',
        ]);
        
        Post::create([
            'title'=>'Queimadas da Amazônia',
            'subtitle'=>'Por que as queimadas são ruins?',
            'slug'=>'amazonia',
            'content'=> 'eu nao gosto muito das queimadas da amazônia',
            'status'=> PostStatus::PUBLICADO,
            'owner_id'=>$user->id
        ]);
    }
}
