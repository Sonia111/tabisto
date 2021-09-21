<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdventureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdventureRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups"={"adv:read"}},
 *     denormalizationContext={"groups"={"adv:write"}},
 *      collectionOperations = {
 *            "post"={
 *              "method"="POST",
 *              "path"="/adventure/start",
 *          }
 *     }
 * )
 */
class Adventure
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"adv:read", "adv:write"})
     */
    private $score;

    /**
     * @ORM\ManyToOne(targetEntity=Character::class, inversedBy="adventure", cascade={"persist", "remove"})
     * @Groups({"adv:read", "adv:write"})
     */
    private $character;

    /**
     * @ORM\ManyToOne(targetEntity=Tile::class, inversedBy="adventure", cascade={"persist", "remove"})
     * @Groups({"adv:read", "adv:write"})
     */
    private $tile;


    public function __construct()
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getCharacter(): ?Character
    {
        return $this->character;
    }

    public function setCharacter(?Character $character): self
    {
        $this->character = $character;

        return $this;
    }

    public function getTile(): ?Tile
    {
        return $this->tile;
    }

    public function setTile(?Tile $tile): self
    {
        $this->tile = $tile;

        return $this;
    }

}
