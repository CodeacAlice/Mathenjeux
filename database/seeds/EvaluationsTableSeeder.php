<?php

use Illuminate\Database\Seeder;

class EvaluationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evaluations')->insert([
        	[
        		'question' => 'De quel type est l\'équation 3x-1=7 ? (commencer la réponse par "équation")',
        		'answer' => 'équationsimple',
        		'chapters_id' => 5
        	],
        	[
        		'question' => 'Quelle est la solution de l\'équation : 5-4x=2x+4 ?',
        		'answer' => '1/6',
        		'chapters_id' => 5
        	],
        	[
        		'question' => 'Vrai ou faux : 1 est solution de l\'équation 3x²+2x-6=0.',
        		'answer' => 'faux',
        		'chapters_id' => 5
        	],
        	[
        		'question' => 'Après avoir développé (2x+8)*(x-1), donner les solutions de l\'équation 2x²+6x-8=0.',
        		'answer' => '-4;1',
        		'chapters_id' => 5
        	],
        	[
        		'question' => 'De quel type est l\'équation x²+9=6x ? (commencer la réponse par "équation")',
        		'answer' => 'équationproduitnul',
        		'chapters_id' => 5
        	],
        	[
        		'question' => 'Vrai ou faux : 1/2 est solution de l\'équation 3x-1=-x+1.',
        		'answer' => 'vrai',
        		'chapters_id' => 5
        	],
            [
                'question' => 'Quelle est la solution de l\'équation : -5x=2x-7 ?',
                'answer' => '1',
                'chapters_id' => 5
            ],
            [
                'question' => 'Quelle est la solution de l\'équation : 8-12x=3x+13 ?',
                'answer' => '-1/3',
                'chapters_id' => 5
            ],
        ]);
    }
}
