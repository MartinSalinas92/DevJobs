<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalarioSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salarios')->insert([
            'salario'=>'0-1000 USD',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);
        DB::table('salarios')->insert([
            'salario'=>'1000-2000 USD',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);
        DB::table('salarios')->insert([
            'salario'=>'3000-4000 USD',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);
        DB::table('salarios')->insert([
            'salario'=>'4000-5000 USD',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);
        DB::table('salarios')->insert([
            'salario'=>'NO MOSTRAR',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);
    }
}
