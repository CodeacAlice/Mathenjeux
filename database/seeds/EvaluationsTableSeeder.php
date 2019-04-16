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
        		'question' => 'Question test dont la réponse est bonjour.',
        		'answer' => 'bonjour',
        		'chapters_id' => 5
        	],
        	[
        		'question' => 'De quel type est l\'équation 3x-1=7 ?',
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
        		'question' => 'Question test dont la réponse est 1&2.',
        		'answer' => '1&2',
        		'chapters_id' => 5
        	],
        	[
        		'question' => 'Question test dont la réponse est "\'"\'".',
        		'answer' => '"\'"\'"',
        		'chapters_id' => 5
        	]
        ]);
    }
}
