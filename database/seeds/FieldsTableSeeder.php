<?php

use Illuminate\Database\Seeder;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fields')->insert([
        	['id' => 1,'name' => 'Nombres et calculs'],
        	['id' => 2,'name' => 'Organisation, gestion de données, fonctions'],
        	['id' => 3,'name' => 'Grandeurs et mesures'],
        	['id' => 4,'name' => 'Espace et géométrie'],
        	['id' => 5,'name' => 'Algorithmique et programmation']
        ]);
    }
}
