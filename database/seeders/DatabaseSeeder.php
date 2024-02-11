<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);
        User::create([
            'name' => 'Rizki Malik',
            'username' => 'rimali',
            'email' => 'rimali.qwerty@gmail.com',
            'password' => bcrypt('12345'),
        ]);
        User::factory(5)->create();
        
        Category::create([
            'name' => 'Programming',
            'slug' => 'programming',
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
        Category::create([
            'name' => 'Design',
            'slug' => 'design',
        ]);

        $faker = Faker::create();

        Post::create([
            'title' => 'Pengenalan HTMX',
            'slug' => 'pengenalan-htmx',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit maiores dolore harum non quo quia dolorem ipsa porro, excepturi, impedit autem voluptates magni',
            'body' => collect($faker->paragraphs(mt_rand(5,10)))
            ->map(fn($p) => "<p class='py-2'>$p</p>")
            ->implode(''),
            'category_id' => 1,
            'user_id' =>1,
        ]);
        Post::create([
            'title' => 'Impian Spesifikasi Komputer',
            'slug' => 'impian-spesifikasi-komputer',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit maiores dolore harum non quo quia dolorem ipsa porro, excepturi, impedit autem voluptates magni',
            'body' => collect($faker->paragraphs(mt_rand(5,10)))
            ->map(fn($p) => "<p class='py-2'>$p</p>")
            ->implode(''),
            'category_id' => 2,
            'user_id' =>1,
        ]);
        Post::create([
            'title' => '3 Design Website UI Terbaik untuk portofolio',
            'slug' => '3-design-website-ui-terbaik-untuk-portofolio',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit maiores dolore harum non quo quia dolorem ipsa porro, excepturi, impedit autem voluptates magni',
            'body' => collect($faker->paragraphs(mt_rand(5,10)))
            ->map(fn($p) => "<p class='py-2'>$p</p>")
            ->implode(''),
            'category_id' => 3,
            'user_id' =>2,
        ]);

        Post::factory(20)->create();
    }
}
