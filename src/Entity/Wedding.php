<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="wedding")
 */
class Wedding
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\Column(name="names", type="text")
     */
    private string $names;

    /**
     * @ORM\Column(name="present", type="boolean")
     */
    private bool $present;

    /**
     * @ORM\Column(name="amount", type="integer")
     */
    private int $amount;

    /**
     * @ORM\Column(name="createdOn", type="datetime")
     */
    private DateTime $createdOn;

    public function __construct(string $names, bool $present)
    {
        $this->names = $names;
        $this->present = $present;
        $this->amount = 1;
        $this->createdOn = new DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNames(): string
    {
        return $this->names;
    }

    public function setNames(string $names): void
    {
        $this->names = $names;
    }

    public function isPresent(): bool
    {
        return $this->present;
    }

    public function setPresent(bool $present): void
    {
        $this->present = $present;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getCreatedOn(): DateTime
    {
        return $this->createdOn;
    }

    public function setCreatedOn(DateTime $createdOn): void
    {
        $this->createdOn = $createdOn;
    }

}
