<?php

declare(strict_types=1);

namespace ArgoTest\DocBlockParser\Tags;

use Argo\DocBlockParser\Tags\TagInterface;
use Argo\DocBlockParser\Tags\ThrowsTag;
use Argo\Types\Atomic\ClassType;
use ArgoTest\DocBlockParser\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(ThrowsTag::class)]
class ThrowsTagTest extends TestCase
{
    public static function dataProvider(): iterable
    {
        yield [new ThrowsTag(new ClassType('HelloClass')), '@throws HelloClass'];
        yield [new ThrowsTag(new ClassType('HelloClass'), 'Description'), '@throws HelloClass Description'];
    }

    #[DataProvider('dataProvider')]
    public function testToString(TagInterface $tag, string $expected): void
    {
        self::assertEquals($expected, (string) $tag);
    }
}
