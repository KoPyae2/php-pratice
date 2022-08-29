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
        $mgmg=User::factory()->create(['name'=>'mg mg','username'=>'mgmg']);
        $aungaung = User::factory()->create(['name' => 'aungaung', 'username' => 'aungaung']);
        $front = Catagory::factory()->create(['name'=>'frondend', 'slug' => 'frondend']);
        $back = Catagory::factory()->create(['name' => 'backend', 'slug' => 'backend']);

        Blog::factory(2)->create(['catagory_id' => $front->id,'user_id'=>$mgmg->id]);
        Blog::factory(2)->create(['catagory_id' => $back->id, 'user_id' => $aungaung->id]);
    }
}