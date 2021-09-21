<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterRepository::class)
 * @ApiResource()
 */
class Character
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"adv:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="character", cascade={"persist", "remove"})
     * @Groups({"adv:read", "adv:write"})
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=Adventure::class, mappedBy="character", cascade={"persist", "remove"})
     * @ApiSubresource(maxDepth=1)
     */
    private $adventure;



    public function __construct()
    {
        $this->adventure = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
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
            $adventure->setCharacter($this);
        }

        return $this;
    }

    public function removeAdventure(Adventure $adventure): self
    {
        if ($this->adventure->removeElement($adventure)) {
            // set the owning side to null (unless already changed)
            if ($adventure->getCharacter() === $this) {
                $adventure->setCharacter(null);
            }
        }

        return $this;
    }





}
