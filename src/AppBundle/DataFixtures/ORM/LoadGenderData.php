<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Gender;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadGenderData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
		$genders = array(
        	'Him',
			'Her',
			'Their',
			'Other',
			'Not Specified',
        );

        foreach($genders as $name) {
          $gender = new Gender();
			$gender->setName($name);

          $manager->persist($gender);
          $manager->flush();
        }
    }
}