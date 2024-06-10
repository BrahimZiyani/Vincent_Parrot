<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User; // Assumant que l'entité Admin est en fait User

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "integer", name: "review_id")]
    private ?int $review_id = null;

    #[ORM\Column(length: 255)]
    private ?string $reviewContent = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateSent = null;

    #[ORM\Column(type: "boolean")]
    private ?bool $messageStatus = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $admin = null;

    public function getReviewId(): ?int
    {
        return $this->review_id;
    }

    // Supprimer la méthode setReviewId() car Doctrine gère la clé primaire auto-incrémentée

    public function getReviewContent(): ?string
    {
        return $this->reviewContent;
    }

    public function setReviewContent(string $reviewContent): static
    {
        $this->reviewContent = $reviewContent;

        return $this;
    }

    public function getDateSent(): ?\DateTimeInterface
    {
        return $this->dateSent;
    }

    public function setDateSent(\DateTimeInterface $dateSent): static
    {
        $this->dateSent = $dateSent;

        return $this;
    }

    public function getMessageStatus(): ?bool
    {
        return $this->messageStatus;
    }

    public function setMessageStatus(bool $messageStatus): static
    {
        $this->messageStatus = $messageStatus;

        return $this;
    }

    public function getAdmin(): ?User
    {
        return $this->admin;
    }

    public function setAdmin(User $admin): static
    {
        $this->admin = $admin;

        return $this;
    }
}
