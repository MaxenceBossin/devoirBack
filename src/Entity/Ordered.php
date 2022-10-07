<?php

namespace App\Entity;

use App\Repository\OrderedRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderedRepository::class)]
class Ordered
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $reference = null;

    #[ORM\ManyToOne(inversedBy: 'ordereds')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userOrdered = null;

    #[ORM\ManyToMany(targetEntity: Cloack::class, inversedBy: 'ordereds')]
    private Collection $product;

    public function __construct()
    {
        $this->product = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getUserOrdered(): ?User
    {
        return $this->userOrdered;
    }

    public function setUserOrdered(?User $userOrdered): self
    {
        $this->userOrdered = $userOrdered;

        return $this;
    }

    /**
     * @return Collection<int, Cloack>
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(cloack $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product->add($product);
        }

        return $this;
    }

    public function removeProduct(cloack $product): self
    {
        $this->product->removeElement($product);

        return $this;
    }
}
