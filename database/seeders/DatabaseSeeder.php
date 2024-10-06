<?php

namespace Database\Seeders;

use App\Enums\PostStatus;
use App\Models\Post;
use App\Models\PostPhoto;
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
        
        $post1 = Post::create([
            'title'=>'Queimadas da Amazônia',
            'subtitle'=>'Por que as queimadas são ruins?',
            'slug'=>'amazonia',
            'content'=> 'eu nao gosto muito das queimadas da amazônia',
            'status'=> PostStatus::PUBLICADO,
            'owner_id'=>$user->id
        ]);

        $photo1 = PostPhoto::create([
            'file_name'=>"5462680.png",
            'file_path'=>"/5462680.172823279699-.png",
            'file_extension'=>"png",
            'mime_type'=>"image/png",
            'file_size'=>36553,
            'post_id'=>$post1->id,
        ]);
        $post1->update(['thumbnail_id'=>$photo1->id]);

        $this->call([
            PermissionsSeeder::class,
            UserSeeder::class
        ]);
    }
}
