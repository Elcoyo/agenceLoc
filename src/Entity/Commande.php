<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Membre $idMembre = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vehicule $idVehicule = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateHeureDepart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateHeureFin = null;

    #[ORM\Column]
    private ?int $prixTotal = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateEnregistrement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMembre(): ?Membre
    {
        return $this->idMembre;
    }

    public function setIdMembre(?Membre $idMembre): static
    {
        $this->idMembre = $idMembre;

        return $this;
    }

    public function getIdVehicule(): ?Vehicule
    {
        return $this->idVehicule;
    }

    public function setIdVehicule(?Vehicule $idVehicule): static
    {
        $this->idVehicule = $idVehicule;

        return $this;
    }

    public function getDateHeureDepart(): ?\DateTimeInterface
    {
        return $this->dateHeureDepart;
    }

    public function setDateHeureDepart(\DateTimeInterface $dateHeureDepart): static
    {
        $this->dateHeureDepart = $dateHeureDepart;

        return $this;
    }

    public function getDateHeureFin(): ?\DateTimeInterface
    {
        return $this->dateHeureFin;
    }

    public function setDateHeureFin(\DateTimeInterface $dateHeureFin): static
    {
        $this->dateHeureFin = $dateHeureFin;

        return $this;
    }

    public function getPrixTotal(): ?int
    {
        return $this->prixTotal;
    }

    public function setPrixTotal(int $prixTotal): static
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    public function getDateEnregistrement(): ?\DateTimeInterface
    {
        return $this->dateEnregistrement;
    }

    public function setDateEnregistrement(\DateTimeInterface $dateEnregistrement): static
    {
        $this->dateEnregistrement = $dateEnregistrement;

        return $this;
    }
}
