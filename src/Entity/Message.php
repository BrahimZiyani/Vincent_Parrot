<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "integer", name: "message_id")]
    private ?int $message_id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $sender = null;

    #[ORM\Column(length: 255)]
    private ?string $messageContent = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateSent = null;

    #[ORM\Column(type: "boolean")]
    private ?bool $messageStatus = null;

    public function getMessageId(): ?int
    {
        return $this->message_id;
    }

    public function getSender(): ?User
    {
        return $this->sender;
    }

    public function setSender(User $sender): static
    {
        $this->sender = $sender;

        return $this;
    }

    public function getMessageContent(): ?string
    {
        return $this->messageContent;
    }

    public function setMessageContent(string $messageContent): static
    {
        $this->messageContent = $messageContent;

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
}
