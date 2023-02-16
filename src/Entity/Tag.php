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
#[Table(name: 'tag')]
class Tag
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: Types::INTEGER)]
    public int $id;

    #[ManyToMany(targetEntity: Post::class, mappedBy: 'tags')]
    public Collection $posts;

    #[Column(type: Types::STRING)]
    public string $name;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }
}
