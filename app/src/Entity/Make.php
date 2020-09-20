<?php

namespace App\Entity;

use App\Repository\MakeRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollections;

/**
 * @ORM\Entity(repositoryClass=MakeRepository::class)
 */
class Make
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Model", mappedBy="make")
     * @var Model[] An ArrayCollection of Model objects
     */
    private $models;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function hasModel(Model $model)
    {
        $this->models[] = $model;
    }
}
