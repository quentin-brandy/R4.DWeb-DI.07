<?php

namespace App\Entity;

use App\Repository\BrickCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BrickCategoryRepository::class)]
class BrickCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(targetEntity: Bricks::class, mappedBy: 'category_id')]
    private Collection $bricks;

    public function __construct()
    {
        $this->bricks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
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

    /**
     * @return Collection<int, Bricks>
     */
    public function getBricks(): Collection
    {
        return $this->bricks;
    }

    public function addBrick(Bricks $brick): static
    {
        if (!$this->bricks->contains($brick)) {
            $this->bricks->add($brick);
            $brick->setCategoryId($this);
        }

        return $this;
    }

    public function removeBrick(Bricks $brick): static
    {
        if ($this->bricks->removeElement($brick)) {
            // set the owning side to null (unless already changed)
            if ($brick->getCategoryId() === $this) {
                $brick->setCategoryId(null);
            }
        }

        return $this;
    }
}
