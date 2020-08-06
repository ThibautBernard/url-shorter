<?php

namespace App\Entity;

use App\Repository\UrlRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UrlRepository::class)
 */
class Url
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameShortUrl;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $originalUrl;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameShortUrl(): ?string
    {
        return $this->nameShortUrl;
    }

    public function setNameShortUrl(string $nameShortUrl): self
    {
        $this->nameShortUrl = $nameShortUrl;

        return $this;
    }

    public function getOriginalUrl(): ?string
    {
        return $this->originalUrl;
    }

    public function setOriginalUrl(string $originalUrl): self
    {
        $this->originalUrl = $originalUrl;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

   
}
