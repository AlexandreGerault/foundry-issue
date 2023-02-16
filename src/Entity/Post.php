<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'post')]
class Post
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: Types::INTEGER)]
    public int $id;

    #[ManyToMany(targetEntity: Tag::class, inversedBy: 'posts')]
    public Collection $tags;

    #[Column(type: Types::STRING)]
    public string $title;

    #[Column(type: Types::TEXT)]
    public string $content;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }
}
