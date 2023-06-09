<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;

 #[ORM\Entity(repositoryClass: BookingRepository::class)]

class Booking
{
     #[ORM\Column]
     #[ORM\GeneratedValue]
     #[ORM\Id]

    private ?int $id;

     #[ORM\Column(type:'datetime')]

    private $beginAt;

    #[ORM\Column(type:'datetime', nullable:true)]

    private $endAt = null;

    #[ORM\Column(type:'string', length:255)]

    private $title;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBeginAt(): ?\DateTimeInterface
    {
        return $this->beginAt;
    }

    public function setBeginAt(\DateTimeInterface $beginAt): self
    {
        $this->beginAt = $beginAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    public function setEndAt(?\DateTimeInterface $endAt = null): self
    {
        $this->endAt = $endAt;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
 }