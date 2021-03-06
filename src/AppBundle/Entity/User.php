<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
	const ROLE_ADMIN = 'ROLE_ADMIN';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

	/**
	 * @var \AppBundle\Entity\Profile
	 *
	 * @ORM\OneToOne(targetEntity="AppBundle\Entity\Profile", cascade={"PERSIST", "REMOVE", "REFRESH"})
	 * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
	 */
    private $profile;

    private $roleImportance = array(
    	self::ROLE_SUPER_ADMIN,
		self::ROLE_ADMIN,
		self::ROLE_DEFAULT,
	);

    public function __construct()
    {
        parent::__construct();
        $this->profile = new Profile();
    }

	/**
	 * @return mixed|string
	 */
    public function getRole()
	{
		foreach($this->roleImportance as $role) {
			if(in_array($role, $this->roles)) {
				return $role;
			}
		}

		return self::ROLE_DEFAULT;
	}

	/**
	 * @param $role
	 */
	public function setRole($role)
	{
		$this->roles = array($role);
	}

	/**
	 * @return \AppBundle\Entity\Profile
	 */
	public function getProfile()
	{
		return $this->profile;
	}

	/**
	 * @param \AppBundle\Entity\Profile $profile
	 *
	 * @return User
	 */
	public function setProfile(Profile $profile)
	{
		$this->profile = $profile;
		return $this;
	}
}