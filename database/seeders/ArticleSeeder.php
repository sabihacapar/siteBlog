<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        for($i=0;$i<4;$i++){
            $title=$faker->sentence(6);
            DB::table('articles')->insert([

                'title'=>$title,
                'image'=>$faker->imageUrl(640,480, 'cats', true, 'Blog Sitesi'),
                'content'=>$faker->paragraph(6),
                'slug'=>Str::slug($title),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
