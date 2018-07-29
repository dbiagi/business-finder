<?php declare(strict_types=1);

namespace BusinessFinder\AppBundle\Security;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Definition of UserProvider
 *
 * @author Diego de Biagi <diegobiagiviana@gmail.com>
 */
class User implements UserInterface
{

    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var $string */
    private $salt;

    /** @var array */
    private $roles;

    public function __construct($username, $password, $salt, array $roles)
    {
        $this->username = $username;
        $this->password = $password;
        $this->salt = $salt;
        $this->roles = $roles;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function eraseCredentials()
    {
    }

}