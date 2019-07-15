<?php

use App\Task;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tasks')->delete();
        $faker = Faker\Factory::create();

        for($i = 0; $i<50;$i++){
            Task::create([
                'description' =>$faker->text(250),
                'user_id' => $faker->randomElement([1,2,3])
            ]);
        }

    }
}
