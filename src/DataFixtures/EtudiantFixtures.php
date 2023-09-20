<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtudiantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {


        // $product = new Product();
        $faker = Faker\Factory::create('fr_FR');
        for ($e = 0; $e < 100; $e++) {
            echo $faker->Nom() . "\n";


        }
        $etudiant = new Etudiant();
        $etudiant->setNom('Bacri');
        $etudiant->setPrenom('Jean-Pierre');
        $etudiant->setSexe(2);
        $etudiant->setAnniversaire(new \DateTime('2001-05-21'));

        $manager->persist($etudiant);

        $manager->flush();
    }
}
