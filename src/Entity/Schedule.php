<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;

#[ORM\Entity(repositoryClass: ScheduleRepository::class)]
class Schedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "integer", name: "schedule_id")]
    private ?int $schedule_id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $monday = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $tuesday = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $wednesday = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $thursday = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $friday = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $saturday = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $sunday = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $organiser = null;

    public function getScheduleId(): ?int
    {
        return $this->schedule_id;
    }

    // Supprimez la méthode setScheduleId() car Doctrine gère la clé primaire auto-incrémentée

    public function getMonday(): ?\DateTimeInterface
    {
        return $this->monday;
    }

    public function setMonday(?\DateTimeInterface $monday): static
    {
        $this->monday = $monday;

        return $this;
    }

    public function getTuesday(): ?\DateTimeInterface
    {
        return $this->tuesday;
    }

    public function setTuesday(?\DateTimeInterface $tuesday): static
    {
        $this->tuesday = $tuesday;

        return $this;
    }

    public function getWednesday(): ?\DateTimeInterface
    {
        return $this->wednesday;
    }

    public function setWednesday(?\DateTimeInterface $wednesday): static
    {
        $this->wednesday = $wednesday;

        return $this;
    }

    public function getThursday(): ?\DateTimeInterface
    {
        return $this->thursday;
    }

    public function setThursday(?\DateTimeInterface $thursday): static
    {
        $this->thursday = $thursday;

        return $this;
    }

    public function getFriday(): ?\DateTimeInterface
    {
        return $this->friday;
    }

    public function setFriday(?\DateTimeInterface $friday): static
    {
        $this->friday = $friday;

        return $this;
    }

    public function getSaturday(): ?\DateTimeInterface
    {
        return $this->saturday;
    }

    public function setSaturday(?\DateTimeInterface $saturday): static
    {
        $this->saturday = $saturday;

        return $this;
    }

    public function getSunday(): ?\DateTimeInterface
    {
        return $this->sunday;
    }

    public function setSunday(?\DateTimeInterface $sunday): static
    {
        $this->sunday = $sunday;

        return $this;
    }

    public function getOrganiser(): ?User
    {
        return $this->organiser;
    }

    public function setOrganiser(User $organiser): static
    {
        $this->organiser = $organiser;

        return $this;
    }
}
