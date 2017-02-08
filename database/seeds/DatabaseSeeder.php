<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stations')->truncate();
        DB::table('schedule')->truncate();

        $station = [
            'name' => 'Кривой Рог'
        ];

        $schedule = [
            'train_time' => '07:00',
            'train_reg' => '{0,1}'
        ];

        $station1 = App\Station::create($station);
        $schedule = App\Schedule::create($schedule);
        $station1->schedule()->save($schedule);

    }
}
