<?php

namespace App\Entity;
use App\Entity\Trait\SlugTrait;
use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    
    use SlugTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateEevenement = null;

    #[ORM\Column(length: 255)]
    private ?string $lieuEvenement = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $detailLieu = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;
    
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_collect = null;

    #[ORM\OneToMany(mappedBy: 'yes', targetEntity: Participation::class, orphanRemoval: true)]
    private Collection $Participation;

    public function __construct()
    {
        $this->Participation = new ArrayCollection();
    }

    // les relation

    
    

    


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDateEevenement(): ?\DateTimeInterface
    {
        return $this->dateEevenement;
    }

    public function setDateEevenement(\DateTimeInterface $dateEevenement): self
    {
        $this->dateEevenement = $dateEevenement;

        return $this;
    }

    public function getLieuEvenement(): ?string
    {
        return $this->lieuEvenement;
    }

    public function setLieuEvenement(string $lieuEvenement): self
    {
        $this->lieuEvenement = $lieuEvenement;

        return $this;
    }

    public function getDetailLieu(): ?string
    {
        return $this->detailLieu;
    }

    public function setDetailLieu(string $detailLieu): self
    {
        $this->detailLieu = $detailLieu;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    
  


    public function getDateCollect(): ?\DateTimeInterface
    {
        return $this->date_collect;
    }

    public function setDateCollect(\DateTimeInterface $date_collect): self
    {
        $this->date_collect = $date_collect;

        return $this;
    }

    /**
     * @return Collection<int, Participation>
     */
    public function getParticipation(): Collection
    {
        return $this->Participation;
    }

    public function addParticipation(Participation $participation): self
    {
        if (!$this->Participation->contains($participation)) {
            $this->Participation->add($participation);
            $participation->setYes($this);
        }

        return $this;
    }

    public function removeParticipation(Participation $participation): self
    {
        if ($this->Participation->removeElement($participation)) {
            // set the owning side to null (unless already changed)
            if ($participation->getYes() === $this) {
                $participation->setYes(null);
            }
        }

        return $this;
    }

   

    
    

    
}
