<?php

use Illuminate\Database\Seeder;

class PublicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publications')->insert([
            'titre' => 'Galieo',
            'nbnum' => 12,
            'photo' => '20170629111703.jpg',
            'details' => 'Galileo est un système de positionnement par satellites (radionavigation) développé par l\'Union européenne dont le déploiement doit s\'achever vers 2020. Comme les systèmes américain GPS (Global Positioning System), russe GLONASS et chinois Beidou il permet à un utilisateur muni d\'un terminal de réception d\'obtenir sa position. La précision attendue pour le service de base, gratuit, est de 4 mètres horizontalement et de 8 mètres en altitude. Un niveau de qualité supérieur sera fourni dans le cadre de services payants proposés aux professionnels.',
            'prix' => 120,

        ]);

        DB::table('publications')->insert([
            'titre' => 'Json bourn',
            'nbnum' => 12,
            'photo' => '20170629111748.jpg',
            'details' => 'ason Bourne a longtemps été un homme sans patrie, sans passé ni mémoire. Un conditionnement physique et mental d\'une extrême brutalité en avait fait une machine à tuer - l\'exécuteur le plus implacable de l\'histoire de la CIA. L\'expérience tourna court et l\'Agence décida de le sacrifier.
Laissé pour mort, Jason se réfugie en Italie et entreprend une lente et périlleuse remontée dans le temps à la recherche de son identité. Après l\'assassinat de sa compagne, Marie, il retrouve l\'instigateur du programme Treadstone qui a fait de lui un assassin et l\'a condamné à l\'errance. S\'estimant vengé par la mort de ce dernier, il n\'aspire plus qu\'à disparaître et vivre en paix. Tout semble rentré dans l\'ordre : Treadstone ne serait plus qu\'une page noire – une de plus - dans l\'histoire de l\'Agence...',
            'prix' => 120,

        ]);

        DB::table('publications')->insert([
            'titre' => 'jason',
            'nbnum' => 12,
            'photo' => '20170629111742.jpg',
            'details' => 'Dans la mythologie grecque, Jason (en grec ancien Ἰάσων / Iásôn, « le guérisseur ») est le fils d\'Éson, roi d\'Iolcos en Thessalie, et un descendant d\'Éole. Il est principalement connu pour sa quête de la Toison d\'or avec les Argonautes. Il est l\'un des principaux héros grecs et particulièrement vénéré à Athènes.',
            'prix' => 120,

        ]);

        DB::table('publications')->insert([
            'titre' => 'Entrepreneur',
            'nbnum' => 12,
            'photo' => '20170629111708.jpg',
            'details' => 'Entrepreneur hehe',
            'prix' => 120,

        ]);

        DB::table('publications')->insert([
            'titre' => 'Vogue',
            'nbnum' => 12,
            'photo' => '20170629111700.png',
            'details' => 'Physiquement intelligente',
            'prix' => 120,

        ]);

        DB::table('publications')->insert([
            'titre' => 'Asis',
            'nbnum' => 12,
            'photo' => '20170629111725.jpeg',
            'details' => 'Physiquement intelligente',
            'prix' => 120,

        ]);

        DB::table('publications')->insert([
            'titre' => 'Json Stattam',
            'nbnum' => 12,
            'photo' => '20170629111719.jpg',
            'details' => 'Bien avant d\'être connu, Jason Statham eut un premier casting à l\'âge de 12 ans, à l\'issue duquel il fut refusé. Au début des années 1990, son physique musclé lui permet de faire de la figuration dans deux vidéo-clips : d\'abord en 1992, dans le clip de Comin\'on Strong des The Shamen, dans lequel il danse de façon sensuelle en slip léopard puis, en 1994, dans le clip du single Run to the Sun du groupe britannique Erasure, dans lequel il prend des postures de culturiste sur le planétarium surmontant l\'horloge universelle de l\'Alexanderplatz (Berlin), le corps enduit de maquillage argenté et vêtu d\'un simple caleçon6. Par la suite, il gagne sa vie en tant que mannequin pour la chaîne de vêtements French Connection.',
            'prix' => 120,

        ]);

        DB::table('publications')->insert([
            'titre' => 'Teaser',
            'nbnum' => 12,
            'photo' => '20170629111713.jpg',
            'details' => 'Teaser magazine',
            'prix' => 120,

        ]);

        DB::table('publications')->insert([
            'titre' => 'Allure',
            'nbnum' => 12,
            'photo' => '20170629121714.jpg',
            'details' => 'Physiquement intelligente',
            'prix' => 120,

        ]);

        DB::table('publications')->insert([
            'titre' => 'Entertaiment',
            'nbnum' => 12,
            'photo' => '20170629121748.jpg',
            'details' => 'Batman wonderwoman',
            'prix' => 120,

        ]);

        DB::table('publications')->insert([
            'titre' => 'Tout-terrain',
            'nbnum' => 12,
            'photo' => '20170629121718.jpg',
            'details' => 'Moto tout terrain',
            'prix' => 120,

        ]);

        DB::table('publications')->insert([
            'titre' => 'Hello',
            'nbnum' => 12,
            'photo' => '20170629121740.jpg',
            'details' => 'Physiquement intelligente',
            'prix' => 120,

        ]);

        DB::table('publications')->insert([
            'titre' => 'Sport-illustated',
            'nbnum' => 12,
            'photo' => '20170629121730.jpg',
            'details' => 'Physiquement intelligente',
            'prix' => 120,

        ]);

        DB::table('publications')->insert([
            'titre' => 'Popular science',
            'nbnum' => 12,
            'photo' => '20170629121753.jpg',
            'details' => 'Science populaire',
            'prix' => 120,

        ]);
    }
}
