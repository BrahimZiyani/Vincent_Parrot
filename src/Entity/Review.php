<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $review_id = null;

    #[ORM\Column(length: 255)]
    private ?string $reviewContent = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateSent = null;

    #[ORM\Column]
    private ?bool $messageStatus = null;

    #[ORM\Column]
    private ?int $admin_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReviewId(): ?int
    {
        return $this->review_id;
    }

    public function setReviewId(int $review_id): static
    {
        $this->review_id = $review_id;

        return $this;
    }

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

    public function isMessageStatus(): ?bool
    {
        return $this->messageStatus;
    }

    public function setMessageStatus(bool $messageStatus): static
    {
        $this->messageStatus = $messageStatus;

        return $this;
    }

    public function getAdminId(): ?int
    {
        return $this->admin_id;
    }

    public function setAdminId(int $admin_id): static
    {
        $this->admin_id = $admin_id;

        return $this;
    }
}
