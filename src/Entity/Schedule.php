<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScheduleRepository::class)]
class Schedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $schedule_id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $monday = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $tuesday = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $wednesday = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $thursday = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $friday = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $saturday = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $sunday = null;

    #[ORM\Column]
    private ?int $organiser_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScheduleId(): ?int
    {
        return $this->schedule_id;
    }

    public function setScheduleId(int $schedule_id): static
    {
        $this->schedule_id = $schedule_id;

        return $this;
    }

    public function getMonday(): ?\DateTimeInterface
    {
        return $this->monday;
    }

    public function setMonday(\DateTimeInterface $monday): static
    {
        $this->monday = $monday;

        return $this;
    }

    public function getTuesday(): ?\DateTimeInterface
    {
        return $this->tuesday;
    }

    public function setTuesday(\DateTimeInterface $tuesday): static
    {
        $this->tuesday = $tuesday;

        return $this;
    }

    public function getWednesday(): ?\DateTimeInterface
    {
        return $this->wednesday;
    }

    public function setWednesday(\DateTimeInterface $wednesday): static
    {
        $this->wednesday = $wednesday;

        return $this;
    }

    public function getThursday(): ?\DateTimeInterface
    {
        return $this->thursday;
    }

    public function setThursday(\DateTimeInterface $thursday): static
    {
        $this->thursday = $thursday;

        return $this;
    }

    public function getFriday(): ?\DateTimeInterface
    {
        return $this->friday;
    }

    public function setFriday(\DateTimeInterface $friday): static
    {
        $this->friday = $friday;

        return $this;
    }

    public function getSaturday(): ?\DateTimeInterface
    {
        return $this->saturday;
    }

    public function setSaturday(\DateTimeInterface $saturday): static
    {
        $this->saturday = $saturday;

        return $this;
    }

    public function getSunday(): ?\DateTimeInterface
    {
        return $this->sunday;
    }

    public function setSunday(\DateTimeInterface $sunday): static
    {
        $this->sunday = $sunday;

        return $this;
    }

    public function getOrganiserId(): ?int
    {
        return $this->organiser_id;
    }

    public function setOrganiserId(int $organiser_id): static
    {
        $this->organiser_id = $organiser_id;

        return $this;
    }
}
