<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class TerminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            $korisnik_kreirao = rand(1, 10);
            $date = Carbon::create(2021, 1, 25, 0, 0, 0);
            $date = $date->addWeek(rand(1, 52))->addHours(rand(8, 24))->addMinutes((rand(0, 60)))->format('d-m-Y H:i:s');
            DB::table('termin')->insert([
                'naziv_termin' => Str::random(5) . " i " . Str::random(5),
                'kreirao' => $korisnik_kreirao,
                'pocinje_at' => $date,

            ]);
        }
    }
}
