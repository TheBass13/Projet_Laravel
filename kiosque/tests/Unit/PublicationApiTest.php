<?php

use App\Publication;
use Tests\TestCase;
use Illuminate\Support\Facades\Response;

class PublicationApiTest extends TestCase{

    //Permet de configurer l'environnement de test
    public function setUp(){

        parent::setUp();
        Artisan::call('migrate');
    }

    public function testGetPublication(){

        //Création d'une publication de manière aléatoire (grâce à factory) et stock les données dans la base sqlite
        $publication = factory(Publication::class)->create();
        $publication2 = factory(Publication::class)->create();
       // $this->assertEquals(1,Publication::count());
        $responses = $this->call('GET','/publications/getPublications');
        dd($responses);
        $responses->assertStatus(200);
    }
}