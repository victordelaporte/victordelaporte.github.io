<?php

namespace App\DataFixtures;

use App\Entity\Bien;
use App\Entity\Lieu;
use App\Entity\Type;
use App\Entity\Famille;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BienFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //$faker =  \Faker\Factory::create('fr_FR');


            $type1 = new Type();
            $type1->setLabel('Ventes');
            $manager->persist($type1);

            $type2 = new Type();
            $type2->setLabel('Locations');
            
            $manager->persist($type2);

            $famille1 = new Famille();
            $famille1->setLabel("Maison")
                    ->addType($type1)
                    ->addType($type2);

            $manager->persist($famille1);

            $famille2 = new Famille();
            $famille2->setLabel("Appartement")
                    ->addType($type1)
                    ->addType($type2);

            $manager->persist($famille2);

            $famille3 = new Famille();
            $famille3->setLabel("Local Commercial")
                    ->addType($type2);

            $manager->persist($famille3);

            $lieu = new Lieu();
            $lieu->setLabel("Brest");
            $manager->persist($lieu);

            $lieu2 = new Lieu();
            $lieu2->setLabel("Roscoff");
            $manager->persist($lieu2);
            

            $bien = new Bien();
            $bien->setType($type1)
                    ->setFamille($famille2)
                    ->setIsExclusif(true)
                    ->setTitre("voici mon premier bien")
                    ->setLieu($lieu)
                    ->setPiece(6)
                    ->setSurface(70)
                    ->setPrix(83000)
                    ->setDescription("Je vous presente un bien situé dans un quariter calme")
                    ->setIsVisible(true);
            $manager->persist($bien);

            $bien2 = new Bien();
            $bien2->setType($type2)
                    ->setFamille($famille3)
                    ->setIsExclusif(false)
                    ->setTitre("voici mon second bien")
                    ->setLieu($lieu2)
                    ->setPiece(1)
                    ->setSurface(40)
                    ->setPrix(150000)
                    ->setDescription("et voici mon second bien")
                    ->setIsVisible(true);
            $manager->persist($bien2);

        $manager->flush();
    }
}
