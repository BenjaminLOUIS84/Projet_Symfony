<?php

namespace App\Entity;

//use ORM\OrderBy;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]
class Entreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $raisonSociale = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(length: 100)]
    private ?string $adresse = null;

    #[ORM\Column(length: 20)]
    private ?string $cp = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\OneToMany(mappedBy: 'entreprise', targetEntity: Employe::class, orphanRemoval: true)]
    // #[OrderBy("//nom:ASC")] Pour gérer le classement des employés de l'entreprise par ordre alphabétique Croissant (Importer la classe OrderBy)
    private Collection $employes;

    public function __construct()
    {
        $this->employes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->raisonSociale;
    }

    public function setRaisonSociale(string $raisonSociale): static
    {
        $this->raisonSociale = $raisonSociale;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    ////////////////////////////////////////////////////////////////////////
    // Créer une fonction pour formater la date

    // public function getDateCreationFr(): ?string
    // {
    //     return $this->dateCreation->format("d-m-Y");
    // }
    ////////////////////////////////////////////////////////////////////////

    public function setDateCreation(\DateTimeInterface $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): static
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return Collection<int, Employe>
     */
    public function getEmployes(): Collection
    {
        return $this->employes;
    }

    public function addEmploye(Employe $employe): static // Pour ajouter un employé
    {
        if (!$this->employes->contains($employe)) {
            $this->employes->add($employe);
            $employe->setEntreprise($this);
        }

        return $this;
    }

    public function removeEmploye(Employe $employe): static // Pour supprimer un employé
    {
        if ($this->employes->removeElement($employe)) {
            // set the owning side to null (unless already changed)
            if ($employe->getEntreprise() === $this) {
                $employe->setEntreprise(null);
            }
        }

        return $this;
    }
    ////////////////////////////////////////////////////////////////////////
    // Il est possible de créer d'autres fonctions ici

    public function __toString() {        // Pour faciliter l'affichage des autres informations d'une entité

        //Permet d'afficher la raison sociale dans le détail d'une entreprise ET AUSSI dans le détail d'un employé
        //return $this->raisonSociale. " (".$this->cp." ".$this->ville.")"; // Les éléments affichés de la liste des entreprises sont la raison sociale, le cp et la ville
        return $this->raisonSociale. " "; // L'élément affiché de la liste des entreprises est seulement la raison sociale
    }
    ////////////////////////////////////////////////////////////////////////
    // Créer un fonction pour afficher l'adresse complète afin de pouvoir la réutiliser et d'alléger le code dans le fichier show.html.twig

    public function getAdresseComplete(): string
    {
       return  $this->adresse. " " .$this->cp. " " .$this->ville; 
    }
    ////////////////////////////////////////////////////////////////////////
}
