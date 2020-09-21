<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Make;
use App\Entity\Model;

class CarFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $make = new Make();
        $make->setName("Ford");

        $model = new Model();
        $model->setName("Focus");
        $model->setMake($make);

        //$make->hasModel($model)

        $manager->persist($make);
        $manager->persist($model);

        $manager->flush();
    }
}
