<?php

namespace App\Entity;

use App\Repository\ParticipationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipationRepository::class)]
class Participation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'Participation')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Evenement $evenement = null;

    #[ORM\ManyToOne(inversedBy: 'Participation')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'participation', targetEntity: ProduitGestion::class, orphanRemoval: true)]
    private Collection $ProduitGestion;

    public function __construct()
    {
        $this->ProduitGestion = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvenement(): ?Evenement
    {
        return $this->evenement;
    }

    public function setEvenement(?Evenement $evenement): self
    {
        $this->evenement = $evenement;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, ProduitGestion>
     */
    public function getProduitGestion(): Collection
    {
        return $this->ProduitGestion;
    }

    public function addProduitGestion(ProduitGestion $produitGestion): self
    {
        if (!$this->ProduitGestion->contains($produitGestion)) {
            $this->ProduitGestion->add($produitGestion);
            $produitGestion->setParticipation($this);
        }

        return $this;
    }

    public function removeProduitGestion(ProduitGestion $produitGestion): self
    {
        if ($this->ProduitGestion->removeElement($produitGestion)) {
            // set the owning side to null (unless already changed)
            if ($produitGestion->getParticipation() === $this) {
                $produitGestion->setParticipation(null);
            }
        }

        return $this;
    }
}
