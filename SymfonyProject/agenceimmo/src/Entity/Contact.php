<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Regex;

class Contact{

    /**
     * Undocumented variable
     *
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $firsname;

    /**
     * Undocumented variable
     *
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $lastname;

    /**
     * Undocumented variable
     *
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(
     * pattern="/[0-9]{10}/"
     * )
     */
    private $phone;

        /**
     * Undocumented variable
     *
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     * }
     */
    private $email;

    /**
     * Undocumented variable
     *
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     * }
     */
    private $message;

    





    /**
     * Get undocumented variable
     *
     * @return  string|null
     */ 
    public function getFirsname()
    {
        return $this->firsname;
    }

    /**
     * Set undocumented variable
     *
     * @param  string|null  $firsname  Undocumented variable
     *
     * @return  self
     */ 
    public function setFirsname($firsname)
    {
        $this->firsname = $firsname;

        return $this;
    }

    /**
     * Get undocumented variable
     *
     * @return  string|null
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set undocumented variable
     *
     * @param  string|null  $lastname  Undocumented variable
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get pattern="/[0-9]{10}/"
     *
     * @return  string|null
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set pattern="/[0-9]{10}/"
     *
     * @param  string|null  $phone  pattern="/[0-9]{10}/"
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get }
     *
     * @return  string|null
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set }
     *
     * @param  string|null  $email  }
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get }
     *
     * @return  string|null
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set }
     *
     * @param  string|null  $message  }
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}