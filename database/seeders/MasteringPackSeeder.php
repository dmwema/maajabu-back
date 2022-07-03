<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasteringPackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mastering_packs')->insert([
            'title' => 'BASIQUE',
            'hdwav' => 'le format choix de pros audio haute définition pour utilisation dans toutes forme de média',
            'hdwav_price' => '12',
            'wav' => 'le plus populaire de format non compressé, ke standard de l\'industrie pour la distribution',
            'wav_price' => '6',
            'mp3' => 'fait économique format pour partager',
            'mp3_price' => '3',
        ]);

        DB::table('mastering_packs')->insert([
            'title' => 'avancé',
            'hdwav' => 'le format choix de pros audio haute définition pour utilisation dans toutes forme de média',
            'hdwav_price' => '16',
            'wav' => 'le plus populaire de format non compressé, ke standard de l\'industrie pour la distribution',
            'wav_price' => '10',
            'mp3' => 'fait économique
            format pour partager',
            'mp3_price' => '5',
        ]);

        DB::table('mastering_packs')->insert([
            'title' => 'pro',
            'hdwav' => 'le format choix de pros audio haute définition pour utilisation dans toutes forme de média',
            'hdwav_price' => '28',
            'wav' => 'le plus populaire de format non compressé, ke standard de l\'industrie pour la distribution',
            'wav_price' => '19',
            'mp3' => 'fait économique format pour partager',
            'mp3_price' => '11',
        ]);

        DB::table('mastering_packs')->insert([
            'title' => 'Pour 5 Masters',
            'hdwav' => '5 masters',
            'hdwav_price' => '104',
            'wav' => '5 masters',
            'wav_price' => '45',
            'mp3' => '5 masters',
            'mp3_price' => '40',
        ]);

        DB::table('mastering_packs')->insert([
            'title' => 'Pour 10 Masters',
            'hdwav' => '10 masters',
            'hdwav_price' => '205',
            'wav' => '10 masters',
            'wav_price' => '87',
            'mp3' => '10 masters',
            'mp3_price' => '70',
        ]);
    }
}
