<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeRepository")
 */
class Type
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bien", mappedBy="type")
     */
    private $bien;

    public function __construct()
    {
        $this->bien = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection|Bien[]
     */
    public function getBien(): Collection
    {
        return $this->bien;
    }

    public function addBien(Bien $bien): self
    {
        if (!$this->bien->contains($bien)) {
            $this->bien[] = $bien;
            $bien->setType($this);
        }

        return $this;
    }

    public function removeBien(Bien $bien): self
    {
        if ($this->bien->contains($bien)) {
            $this->bien->removeElement($bien);
            // set the owning side to null (unless already changed)
            if ($bien->getType() === $this) {
                $bien->setType(null);
            }
        }

        return $this;
    }
}
