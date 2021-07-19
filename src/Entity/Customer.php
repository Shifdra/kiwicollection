<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 */
class Customer
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=25)
   */
  private $firstName;

  /**
   * @ORM\Column(type="string", length=25)
   */
  private $lastName;

  /**
   * @ORM\Column(type="string", length=50, nullable=true)
   */
  private $streetAddress;

  /**
   * One customer has 0 or many phone numbers. This is the inverse side.
   * @ORM\OneToMany(targetEntity="CustomerPhone", mappedBy="customer")
   */
  private $phoneNumbers;


  public function __construct()
  {
    $this->phoneNumbers = new ArrayCollection();
  }


  public function getId(): ?int
  {
    return $this->id;
  }

  public function getFirstName(): ?string
  {
    return $this->firstName;
  }

  public function setFirstName(string $firstName): self
  {
    $this->firstName = $firstName;

    return $this;
  }

  public function getLastName(): ?string
  {
    return $this->lastName;
  }

  public function setLastName(string $lastName): self
  {
    $this->lastName = $lastName;

    return $this;
  }

  public function getStreetAddress(): ?string
  {
    return $this->streetAddress;
  }

  public function setStreetAddress(string $streetAddress): self
  {
    $this->streetAddress = $streetAddress;

    return $this;
  }

  /**
   * @return Collection|CustomerPhone[]
   */
  public function getPhoneNumbers(): Collection
  {
    return $this->phoneNumbers;
  }
}
