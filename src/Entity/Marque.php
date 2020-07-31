<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MarqueRepository::class)
 */
class Marque
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Chaussure::class, mappedBy="marque")
     */
    private $chaussures;

    /**
     * @ORM\OneToMany(targetEntity=Chausson::class, mappedBy="marque")
     */
    private $chaussons;

    public function __construct()
    {
        $this->chaussures = new ArrayCollection();
        $this->chaussons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Chaussure[]
     */
    public function getChaussures(): Collection
    {
        return $this->chaussures;
    }

    public function addChaussure(Chaussure $chaussure): self
    {
        if (!$this->chaussures->contains($chaussure)) {
            $this->chaussures[] = $chaussure;
            $chaussure->setMarque($this);
        }

        return $this;
    }

    public function removeChaussure(Chaussure $chaussure): self
    {
        if ($this->chaussures->contains($chaussure)) {
            $this->chaussures->removeElement($chaussure);
            // set the owning side to null (unless already changed)
            if ($chaussure->getMarque() === $this) {
                $chaussure->setMarque(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Chausson[]
     */
    public function getChaussons(): Collection
    {
        return $this->chaussons;
    }

    public function addChausson(Chausson $chausson): self
    {
        if (!$this->chaussons->contains($chausson)) {
            $this->chaussons[] = $chausson;
            $chausson->setMarque($this);
        }

        return $this;
    }

    public function removeChausson(Chausson $chausson): self
    {
        if ($this->chaussons->contains($chausson)) {
            $this->chaussons->removeElement($chausson);
            // set the owning side to null (unless already changed)
            if ($chausson->getMarque() === $this) {
                $chausson->setMarque(null);
            }
        }

        return $this;
    }
}
