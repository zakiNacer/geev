<?php

namespace App\Entity;
use App\Entity\Trait\SlugTrait;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProduitRepository;
use phpDocumentor\Reflection\Types\Void_;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: ProduitRepository::class)]

// @Vich\Uploadable
class Produit
{
    use SlugTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomPdroduit = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    
    #[ORM\Column(length: 255,type:'string')]
    private ?string $image = null;

    #[Vich\UploadableField(mapping: 'products', fileNameProperty: 'image')]
    private ?File $attachmentfile = null;




    
    
    #[ORM\ManyToOne(inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $PrduitCategorie = null;

    #[ORM\ManyToOne(inversedBy: 'Produit')]
    #[ORM\JoinColumn(nullable: true)]
    private ?ProduitGestion $produitGestion = null;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: ProduitExemplary::class, orphanRemoval: true)]
    private Collection $produitExemplaries;

    public function __construct()
    {
        $this->produitExemplaries = new ArrayCollection();
    }

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPdroduit(): ?string
    {
        return $this->nomPdroduit;
    }

    public function setNomPdroduit(string $nomPdroduit): self
    {
        $this->nomPdroduit = $nomPdroduit;

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

    
    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
    
    public function getAttachmentFile(): ?File
    {
        return $this->attachmentfile;
    }
    
    public function setAttachmentFile(?File $attachmentfile=null ): void
    {
        $this->attachmentfile = $attachmentfile;
    }

    
    public function getPrduitCategorie(): ?Categorie
    {
        return $this->PrduitCategorie;
    }

    public function setPrduitCategorie(?Categorie $PrduitCategorie): self
    {
        $this->PrduitCategorie = $PrduitCategorie;

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

    /**
     * @return Collection<int, ProduitExemplary>
     */
    public function getProduitExemplaries(): Collection
    {
        return $this->produitExemplaries;
    }

    public function addProduitExemplary(ProduitExemplary $produitExemplary): self
    {
        if (!$this->produitExemplaries->contains($produitExemplary)) {
            $this->produitExemplaries->add($produitExemplary);
            $produitExemplary->setProduit($this);
        }

        return $this;
    }

    public function removeProduitExemplary(ProduitExemplary $produitExemplary): self
    {
        if ($this->produitExemplaries->removeElement($produitExemplary)) {
            // set the owning side to null (unless already changed)
            if ($produitExemplary->getProduit() === $this) {
                $produitExemplary->setProduit(null);
            }
        }

        return $this;
    }

    

    
    

    

    
   
}
