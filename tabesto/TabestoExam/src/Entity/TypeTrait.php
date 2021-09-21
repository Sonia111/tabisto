<?php


namespace App\Entity;
use Symfony\Component\Serializer\Annotation\Groups;



trait TypeTrait
{
    /**
     * @ORM\Column(type="integer")
     * @Groups({"adv:read", "adv:write"})
     */
    private $lifePoint;

    /**
     * @ORM\Column(type="string", length=30)
     * @Groups({"adv:read", "adv:write"})
     */
    private $attackValue;

    /**
     * @ORM\Column(type="string", length=30)
     * @Groups({"adv:read", "adv:write"})
     */
    private $ArmValue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLifePoint(): ?int
    {
        return $this->lifePoint;
    }

    public function setLifePoint(int $lifePoint): self
    {
        $this->lifePoint = $lifePoint;

        return $this;
    }

    public function getAttackValue(): ?string
    {
        return $this->attackValue;
    }

    public function setAttackValue(string $attackValue): self
    {
        $this->attackValue = $attackValue;

        return $this;
    }

    public function getArmValue(): ?string
    {
        return $this->ArmValue;
    }

    public function setArmValue(string $ArmValue): self
    {
        $this->ArmValue = $ArmValue;

        return $this;
    }
}