<?php

namespace App\Entity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommclRepository")
 */
class Commcl
{

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Auteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Contenu;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuteur(): ?string
    {
        return $this->Auteur;
    }

    public function setAuteur(string $Auteur): self
    {
        $this->Auteur = $Auteur;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->Contenu;
    }

    public function setContenu(string $Contenu): self
    {
        $this->Contenu = $Contenu;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

   
       
    
}