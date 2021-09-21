<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TypeTileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
* @ApiResource()
 * @ORM\Entity(repositoryClass=TypeTileRepository::class)
 */
class TypeTile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"adv:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, unique=true)
     * @Groups({"adv:read", "adv:write"})
     */
    private $label;

    /**
     * @ORM\Column(type="string", length=30)
     * @Groups({"adv:read", "adv:write"})
     */
    private $specialEffect;

    /**
     * @ORM\OneToMany(targetEntity=Tile::class, mappedBy="type", cascade={"persist", "remove"})
     */
    private $tile;

    public function __construct()
    {
        $this->tile = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getSpecialEffect(): ?string
    {
        return $this->specialEffect;
    }

    public function setSpecialEffect(string $specialEffect): self
    {
        $this->specialEffect = $specialEffect;

        return $this;
    }

    /**
     * @return Collection|Tile[]
     */
    public function getTile(): Collection
    {
        return $this->tile;
    }

    public function addTile(Tile $tile): self
    {
        if (!$this->tile->contains($tile)) {
            $this->tile[] = $tile;
            $tile->setType($this);
        }

        return $this;
    }

    public function removeTile(Tile $tile): self
    {
        if ($this->tile->removeElement($tile)) {
            // set the owning side to null (unless already changed)
            if ($tile->getType() === $this) {
                $tile->setType(null);
            }
        }

        return $this;
    }
}
