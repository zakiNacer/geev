<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use App\Repository\ProduitGestionRepository;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ProduitGestionRepository::class)]
class ProduitGestion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'ProduitGestion')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Participation $participation = null;

    #[ORM\Column]
    private ?int $etatProduit = 0;

    #[ORM\OneToOne(mappedBy: 'produitGestion', cascade: ['persist', 'remove'])]
    private ?ProduitExemplary $produitExemplary = null;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParticipation(): ?Participation
    {
        return $this->participation;
    }

    public function setParticipation(?Participation $participation): self
    {
        $this->participation = $participation;

        return $this;
    }

    public function getEtatProduit(): ?int
    {
        return $this->etatProduit;
    }

    public function setEtatProduit(int $etatProduit): self
    {
        $this->etatProduit = $etatProduit;

        return $this;
    }

    public function getProduitExemplary(): ?ProduitExemplary
    {
        return $this->produitExemplary;
    }

    public function setProduitExemplary(ProduitExemplary $produitExemplary): self
    {
        // set the owning side of the relation if necessary
        if ($produitExemplary->getProduitGestion() !== $this) {
            $produitExemplary->setProduitGestion($this);
        }

        $this->produitExemplary = $produitExemplary;

        return $this;
    }
}
