<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadUserData extends AbstractFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $users = array(
          'user' => array(
            'email' => '%s@localhost.com',
            'role' => 'ROLE_USER',
          ),
          'admin' => array(
            'email' => '%s@localhost.com',
            'role' => 'ROLE_ADMIN',
          ),
          'superadmin' => array(
            'email' => '%s@localhost.com',
            'role' => 'ROLE_SUPER_ADMIN',
          ),
        );

        foreach($users as $name => $u) {
          $user = new User();
          $user->setUsername($name);
          $user->setEmail(sprintf($u['email'], $name));
          $user->setPlainPassword('1234');
          $user->setSalt(sha1($name.time()));
          $user->setRoles(array($u['role']));
          $user->setEnabled(true);

          $this->setReference('user_'.$name, $user);

          $manager->persist($user);
          $manager->flush();
        }
    }
}