<?php

namespace Database\Seeders;

use App\Enums\PostStatus;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()->create([
            'title'=>'Queimadas da Amazônia',
            'subtitle'=>'Por que as queimadas são ruins?',
            'slug'=>'amazonia',
            'content'=> 'eu nao gosto muito das queimadas da amazônia',
            'status'=> PostStatus::PUBLICADO
        ]);
    }
}
