<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeRepository::class)
 */
class Type
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"adv:read", "adv:write"})
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Character::class, mappedBy="type", cascade={"persist", "remove"})
     */
    private $character;

    /**
     * @ORM\OneToMany(targetEntity=Monster::class, mappedBy="type", cascade={"persist", "remove"})
     */
    private $monster;

    /**
     * @ORM\Column(type="string", length=30, unique=true)
     * @Groups({"adv:read", "adv:write"})
     */
    private $label;

    public function __construct()
    {
        $this->character = new ArrayCollection();
        $this->monster = new ArrayCollection();
    }

    use TypeTrait;

    /**
     * @return Collection|Character[]
     */
    public function getCharacter(): Collection
    {
        return $this->character;
    }

    public function addCharacter(Character $character): self
    {
        if (!$this->character->contains($character)) {
            $this->character[] = $character;
            $character->setType($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): self
    {
        if ($this->character->removeElement($character)) {
            // set the owning side to null (unless already changed)
            if ($character->getType() === $this) {
                $character->setType(null);
            }
        }

        return $this;
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
            $monster->setType($this);
        }

        return $this;
    }

    public function removeMonster(Monster $monster): self
    {
        if ($this->monster->removeElement($monster)) {
            // set the owning side to null (unless already changed)
            if ($monster->getType() === $this) {
                $monster->setType(null);
            }
        }

        return $this;
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
}
