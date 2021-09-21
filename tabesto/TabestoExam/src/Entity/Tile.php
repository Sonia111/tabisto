<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TileRepository::class)
 * @ApiResource(
 *   normalizationContext={"groups"={"get"}}
 * )
 */
class Tile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"adv:read"})
     */
    private $id;


    /**
     * @ORM\OneToMany(targetEntity=Monster::class, mappedBy="tile", cascade={"persist", "remove"})
     */
    private $monster;

    /**
     * @ORM\ManyToOne(targetEntity=TypeTile::class, inversedBy="tile", cascade={"persist", "remove"})
     * @Groups({"adv:read", "adv:write"})
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=Adventure::class, mappedBy="tile", cascade={"persist", "remove"})
     */
    private $adventure;



    public function __construct()
    {
        $this->monster = new ArrayCollection();
        $this->adventure = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @return Collection|Monster[]
     */
    public function getMonster(): Collection
    {
        return $this->monster;
    }

    public function addMonster(Monster $monster): self
    {
        if (!$this->monster->contains($monster)) {
            $this->monster[] = $monster;
            $monster->setTile($this);
        }

        return $this;
    }

    public function removeMonster(Monster $monster): self
    {
        if ($this->monster->removeElement($monster)) {
            // set the owning side to null (unless already changed)
            if ($monster->getTile() === $this) {
                $monster->setTile(null);
            }
        }

        return $this;
    }

    public function getType(): ?TypeTile
    {
        return $this->type;
    }

    public function setType(?TypeTile $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Adventure[]
     */
    public function getAdventure(): Collection
    {
        return $this->adventure;
    }

    public function addAdventure(Adventure $adventure): self
    {
        if (!$this->adventure->contains($adventure)) {
            $this->adventure[] = $adventure;
            $adventure->setTile($this);
        }

        return $this;
    }

    public function removeAdventure(Adventure $adventure): self
    {
        if ($this->adventure->removeElement($adventure)) {
            // set the owning side to null (unless already changed)
            if ($adventure->getTile() === $this) {
                $adventure->setTile(null);
            }
        }

        return $this;
    }
}
