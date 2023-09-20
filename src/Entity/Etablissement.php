<?php

namespace App\Entity;

use App\Repository\EtablissementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtablissementRepository::class)]
class Etablissement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre_etudiants = null;

    #[ORM\OneToMany(mappedBy: 'etablissement', targetEntity: Etudiant::class, orphanRemoval: true)]
    private Collection $etudiantss;

    public function __construct()
    {
        $this->etudiantss = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNombreEtudiants(): ?string
    {
        return $this->nombre_etudiants;
    }

    public function setNombreEtudiants(string $nombre_etudiants): static
    {
        $this->nombre_etudiants = $nombre_etudiants;

        return $this;
    }

    /**
     * @return Collection<int, Etudiant>
     */
    public function getEtudiantss(): Collection
    {
        return $this->etudiantss;
    }

    public function addEtudiantss(Etudiant $etudiantss): static
    {
        if (!$this->etudiantss->contains($etudiantss)) {
            $this->etudiantss->add($etudiantss);
            $etudiantss->setEtablissement($this);
        }

        return $this;
    }

    public function removeEtudiantss(Etudiant $etudiantss): static
    {
        if ($this->etudiantss->removeElement($etudiantss)) {
            // set the owning side to null (unless already changed)
            if ($etudiantss->getEtablissement() === $this) {
                $etudiantss->setEtablissement(null);
            }
        }

        return $this;
    }
}
