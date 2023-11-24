<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    
    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;
    
    
    #[ORM\Column(length: 255)]
    private ?string $numero = null;
    
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DatedeNaissance = null;

    #[ORM\Column(length: 255)]
    private ?string $civilite = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    
    #[ORM\Column(type:'datetime_immutable', options: ['default'=>'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Participation::class, orphanRemoval: true)]
    private Collection $Participation;

    // #[ORM\ManyToMany(targetEntity: Evenement::class, mappedBy: 'users')]
    // private Collection $evenements;

    // #[ORM\OneToMany(mappedBy: 'user', targetEntity: Participation::class)]
    // private Collection $participations;

    


    public function __construct(){
        $this->roles=['ROLE_USER'];
        $this->created_at = new \DateTimeImmutable();
        // $this->evenements = new ArrayCollection();
        // $this->participations = new ArrayCollection();
        $this->Participation = new ArrayCollection();
        
      
       
    }

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }
    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }
    
    public function getDatedeNaissance(): ?\DateTimeInterface
    {
        return $this->DatedeNaissance;
    }

    public function setDatedeNaissance(\DateTimeInterface $DatedeNaissance): self
    {
        $this->DatedeNaissance = $DatedeNaissance;

        return $this;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
    
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    // /**
    //  * @return Collection<int, Evenement>
    //  */
    // public function getEvenements(): Collection
    // {
    //     return $this->evenements;
    // }

    // public function addEvenement(Evenement $evenement): self
    // {
    //     if (!$this->evenements->contains($evenement)) {
    //         $this->evenements->add($evenement);
    //         $evenement->addUser($this);
    //     }

    //     return $this;
    // }

    // public function removeEvenement(Evenement $evenement): self
    // {
    //     if ($this->evenements->removeElement($evenement)) {
    //         $evenement->removeUser($this);
    //     }

    //     return $this;
    // }

    // /**
    //  * @return Collection<int, Participation>
    //  */
    // public function getParticipations(): Collection
    // {
    //     return $this->participations;
    // }

    // public function addParticipation(Participation $participation): self
    // {
    //     if (!$this->participations->contains($participation)) {
    //         $this->participations->add($participation);
    //         $participation->setUser($this);
    //     }

    //     return $this;
    // }

    // public function removeParticipation(Participation $participation): self
    // {
    //     if ($this->participations->removeElement($participation)) {
    //         // set the owning side to null (unless already changed)
    //         if ($participation->getUser() === $this) {
    //             $participation->setUser(null);
    //         }
    //     }

    //     return $this;
    // }

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
            $participation->setUser($this);
        }

        return $this;
    }

    public function removeParticipation(Participation $participation): self
    {
        if ($this->Participation->removeElement($participation)) {
            // set the owning side to null (unless already changed)
            if ($participation->getUser() === $this) {
                $participation->setUser(null);
            }
        }

        return $this;
    }

   

    
}
