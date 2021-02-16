<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class KorisnikTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('korisnik')->insert([
                'ime_korisnik' => Str::random(6),
                'email_korisnik' => Str::random(13) . "@gmail.com",
            ]);
        }
    }
}
