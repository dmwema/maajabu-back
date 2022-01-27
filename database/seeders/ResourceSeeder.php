<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Work;
use App\Models\Phone;
use App\Models\Tarif;
use App\Models\Artist;
use App\Models\Studio;
use App\Models\Contact;
use App\Models\Horaire;
use App\Models\Service;
use App\Models\Category;
use App\Models\Engineer;
use App\Models\Logiciel;
use App\Models\Reservation;
use App\Models\Social_network;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\AssignOp\Concat;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Studio::factory()->count(2)->create();
        Artist::factory()->count(7)->create();
        Category::factory()->count(7)->create();
        Engineer::factory()->count(10)->create();
        Tarif::factory()->count(4)->create();
        //User::factory()->count(10)->create();
                Work::factory()->count(7)->create();
                //Reservation::factory()->count(6)->create();
                //Service::factory()->count(4)->create();
                Social_network::factory()->count(4)->create();
                Phone::factory()->count(2)->create();
                Logiciel::factory()->count(5)->create();
                // Horaire::factory()->count(6)->create();
                Contact::factory()->count(5)->create();
    }
}
