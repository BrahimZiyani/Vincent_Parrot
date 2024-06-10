<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "integer", name: "service_id")]
    private ?int $service_id = null;

    #[ORM\Column(length: 255)]
    private ?string $serviceName = null;

    #[ORM\Column(length: 255)]
    private ?string $serviceDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $serviceType = null;

    #[ORM\Column]
    private ?bool $serviceStatus = null;

    #[ORM\Column]
    private ?int $presenter_id = null;

    public function getServiceId(): ?int
    {
        return $this->service_id;
    }

    public function setServiceId(int $service_id): static
    {
        $this->service_id = $service_id;

        return $this;
    }

    public function getServiceName(): ?string
    {
        return $this->serviceName;
    }

    public function setServiceName(string $serviceName): static
    {
        $this->serviceName = $serviceName;

        return $this;
    }

    public function getServiceDescription(): ?string
    {
        return $this->serviceDescription;
    }

    public function setServiceDescription(string $serviceDescription): static
    {
        $this->serviceDescription = $serviceDescription;

        return $this;
    }

    public function getServiceType(): ?string
    {
        return $this->serviceType;
    }

    public function setServiceType(string $serviceType): static
    {
        $this->serviceType = $serviceType;

        return $this;
    }

    public function isServiceStatus(): ?bool
    {
        return $this->serviceStatus;
    }

    public function setServiceStatus(bool $serviceStatus): static
    {
        $this->serviceStatus = $serviceStatus;

        return $this;
    }

    public function getPresenterId(): ?int
    {
        return $this->presenter_id;
    }

    public function setPresenterId(int $presenter_id): static
    {
        $this->presenter_id = $presenter_id;

        return $this;
    }
}
