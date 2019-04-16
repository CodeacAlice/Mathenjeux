<?php

use Illuminate\Database\Seeder;

class ChaptersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chapters')->insert([
        	[
        		'id' => 1,
        		'order' => 1,
        		'title' => 'Calcul numérique, calcul littéral, résolution de problèmes',
        		'fields_id' => 1,
        	],
        	[
        		'id' => 2,
        		'order' => 2,
        		'title' => 'Les puissances',
        		'fields_id' => 1,
        	],
        	[
        		'id' => 3,
        		'order' => 3,
        		'title' => 'Nombres et arithmétique',
        		'fields_id' => 1,
        	],
        	[
        		'id' => 4,
        		'order' => 4,
        		'title' => 'Égalités remarquables : développement, factorisation',
        		'fields_id' => 1,
        	],
        	[
        		'id' => 5,
        		'order' => 5,
        		'title' => 'Équations et problèmes',
        		'fields_id' => 1,
        	],
        	[
        		'id' => 6,
        		'order' => 6,
        		'title' => 'Inéquations et problèmes',
        		'fields_id' => 1,
        	],
        	[
        		'id' => 7,
        		'order' => 7,
        		'title' => 'Notions de fonctions',
        		'fields_id' => 2,
        	],
        	[
        		'id' => 8,
        		'order' => 8,
        		'title' => 'Fonctions linéraires. Proportionnalité. Pourcentages',
        		'fields_id' => 2,
        	],
        	[
        		'id' => 9,
        		'order' => 9,
        		'title' => 'Fonctions affines',
        		'fields_id' => 2,
        	],
        	[
        		'id' => 10,
        		'order' => 10,
        		'title' => 'Statistiques',
        		'fields_id' => 2,
        	],
        	[
        		'id' => 11,
        		'order' => 11,
        		'title' => 'Probabilités',
        		'fields_id' => 2,
        	],
        	[
        		'id' => 12,
        		'order' => 12,
        		'title' => 'Grandeurs composées, longueurs, aires et volumes',
        		'fields_id' => 3,
        	],
        	[
        		'id' => 13,
        		'order' => 13,
        		'title' => 'Géométrie dans le plan',
        		'fields_id' => 4,
        	],
        	[
        		'id' => 14,
        		'order' => 14,
        		'title' => 'Trigonométrie dans le triangle rectangle',
        		'fields_id' => 4,
        	],
        	[
        		'id' => 15,
        		'order' => 15,
        		'title' => 'Théorème de Thalès. Agrandissement/Réduction. Homothétie',
        		'fields_id' => 4,
        	],
        	[
        		'id' => 16,
        		'order' => 16,
        		'title' => 'Géométrie dans l\'espace : sections planes',
        		'fields_id' => 4,
        	],
        	[
        		'id' => 17,
        		'order' => 17,
        		'title' => 'Algorithmes et programmes',
        		'fields_id' => 5,
        	]
        ]);
        DB::table('chapters')->where('id', 5)
            ->update(['iscomplete' => 1, 'link' => 'equations.php']);
    }
}
