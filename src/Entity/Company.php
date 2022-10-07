<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompanyRepository::class)]
class Company
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $country = null;

    #[ORM\OneToMany(mappedBy: 'Company', targetEntity: Cloack::class)]
    private Collection $cloacks;



    public function __construct()
    {
        $this->cloacks = new ArrayCollection();
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

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection<int, Cloack>
     */
    public function getCloacks(): Collection
    {
        return $this->cloacks;
    }

    public function addCloack(Cloack $cloack): self
    {
        if (!$this->cloacks->contains($cloack)) {
            $this->cloacks->add($cloack);
            $cloack->setCompany($this);
        }

        return $this;
    }

    public function removeCloack(Cloack $cloack): self
    {
        if ($this->cloacks->removeElement($cloack)) {
            // set the owning side to null (unless already changed)
            if ($cloack->getCompany() === $this) {
                $cloack->setCompany(null);
            }
        }

        return $this;
    }


}
