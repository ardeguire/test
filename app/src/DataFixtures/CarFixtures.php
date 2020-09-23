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
        $file_path = '/srv/assignment/make-model.json';

        // load make-model.json into a string
        if (file_exists($file_path))
            $json_string = file_get_contents($file_path);

        // decode JSON into an object we can use
        $json = json_decode($json_string);

        //iterate over makes
        foreach ($json as $obj)
        {

            // create the make
            $make = new Make();
            $make->setName($obj->make);

            // queue Make for write to DB
            $manager->persist($make);

            // iterate over models
            foreach ($obj->models as $json_model)
            {
                // create the model and link it to its make
                $model = new Model();
                $model->setName($json_model);
                $model->setMake($make);
                
                // queue Model for the DB
                $manager->persist($model);
            }

            // commit all the objects to DB
            $manager->flush();
        }
    }
}
