<?php

namespace App\Entity;

use App\Repository\LegoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LegoRepository::class)]
class Lego
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $name = null;

    #[ORM\Column(length: 40)]
    private ?string $collection = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $price = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 0)]
    private ?string $pieces = null;

    #[ORM\Column(length: 100)]
    private ?string $BoxImage = null;

    #[ORM\Column(length: 100)]
    private ?string $LegoImage = null;

    public function __construct($id) {
        $this->id = $id;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCollection(): ?string
    {
        return $this->collection;
    }

    public function setCollection(string $collection): static
    {
        $this->collection = $collection;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getPieces(): ?string
    {
        return $this->pieces;
    }

    public function setPieces(string $pieces): static
    {
        $this->pieces = $pieces;

        return $this;
    }

    public function getBoxImage(): ?string
    {
        return $this->BoxImage;
    }

    public function setBoxImage(string $BoxImage): static
    {
        $this->BoxImage = $BoxImage;

        return $this;
    }

    public function getLegoImage(): ?string
    {
        return $this->LegoImage;
    }

    public function setLegoImage(string $LegoImage): static
    {
        $this->LegoImage = $LegoImage;

        return $this;
    }

}
