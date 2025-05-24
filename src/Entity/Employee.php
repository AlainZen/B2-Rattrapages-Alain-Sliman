<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use DateTimeImmutable;
use DateTime;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity(fields: ['email'], message: 'Cet email est déjà utilisé')]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom de l'employé ne peut pas être vide")]
    #[Assert\Length(
        min: 2,
        max: 255,
        minMessage: "Le nom de l'employé doit contenir au moins {{ limit }} caractères",
        maxMessage: "Le nom de l'employé ne peut pas dépasser {{ limit }} caractères"
    )]
    private ?string $name = null;

    #[ORM\Column(length: 255, unique: true)]
    #[Assert\NotBlank(message: "L'email ne peut pas être vide")]
    #[Assert\Email(message: "L'email '{{ value }}' n'est pas valide")]
    private ?string $email = null;

    #[ORM\Column]
    private ?bool $active = true;

    #[ORM\Column]
    private ?DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?DateTime $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull(message: "L'employé doit être affecté à un restaurant")]
    private ?Restaurant $restaurant = null;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }

    #[ORM\PreUpdate]
    public function setUpdatedAtValue(): void
    {
        $this->updatedAt = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTime $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): static
    {
        $this->restaurant = $restaurant;

        return $this;
    }
}
