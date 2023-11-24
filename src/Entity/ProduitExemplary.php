<?php

namespace App\Entity;

use App\Repository\ProduitExemplaryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitExemplaryRepository::class)]
class ProduitExemplary
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'produitExemplaries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $produit = null;

    #[ORM\OneToOne(inversedBy: 'produitExemplary', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?ProduitGestion $produitGestion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getProduitGestion(): ?ProduitGestion
    {
        return $this->produitGestion;
    }

    public function setProduitGestion(ProduitGestion $produitGestion): self
    {
        $this->produitGestion = $produitGestion;

        return $this;
    }
}
