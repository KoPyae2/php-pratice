<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use App\Models\Catagory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Blog::truncate();
        Catagory::truncate();

        $front = Catagory::factory()->create(['name'=>'frondend']);
        $back = Catagory::factory()->create(['name' => 'backend']);

        Blog::factory(5)->create(['catagory_id' => $front->id]);
        Blog::factory(5)->create(['catagory_id' => $back->id]);

        
    }
}
