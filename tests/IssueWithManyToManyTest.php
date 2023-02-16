<?php

declare(strict_types=1);

namespace App\Tests;

use App\Tests\Factory\PostFactory;
use App\Tests\Factory\TagFactory;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class IssueWithManyToManyTest extends KernelTestCase
{
    use Factories;
    use ResetDatabase;

    public function testManyToManyWithFoundrySetup(): void
    {
        $post = PostFactory::new()->create();

        $tag = TagFactory::new()->create(['posts' => [$post]]);
    }
}
