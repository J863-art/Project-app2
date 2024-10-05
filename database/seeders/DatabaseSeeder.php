<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Artikelku;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Artikelku::factory(15)->create();




        //User::factory()->create([
            //'name' => 'Test User',
            //'email' => 'test@example.com',
        //]);
        //User::create([
          //  'name' => 'Januar Simanjuntak',
            //'nik' => '22222',
        //    'no_telp' => '082281565598',
          //  'password' => bcrypt('12345'),
           // 'role' => 'admin'
        //]);

        //User::create([
          //  'name' => 'Mitaloviana',
           // 'nik' => '33333',
           // 'no_telp' => '087781565598',
            //'password' => bcrypt('54321'),
           // 'role' => 'admin'
        //]);


        // Artikelku::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Judul pertama adalah permulaan',
        //     'body' => 'Judul pertama adalah permulaan, jadi janganlah menyerah kawan',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Artikelku::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Judul kedua adalah lanjutan hidup',
        //     'body' => 'Judul kedua adalah lanjutan hidup, jadi janganlah menyerah kawan',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Artikelku::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Judul ketiga adalah penutup perjalanan kita',
        //     'body' => 'Judul kedua adalah penutup perjalanan kita, jadi janganlah menyerah kawan',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);


    }
}
