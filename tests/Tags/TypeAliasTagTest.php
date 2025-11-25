<?php

declare(strict_types=1);

namespace ArgoTest\DocBlockParser\Tags;

use Argo\DocBlockParser\Tags\TagInterface;
use Argo\DocBlockParser\Tags\TypeAliasTag;
use Argo\Types\Alias\IntRangeType;
use ArgoTest\DocBlockParser\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(TypeAliasTag::class)]
class TypeAliasTagTest extends TestCase
{
    public static function dataProvider(): iterable
    {
        yield [new TypeAliasTag('MyAlias', new IntRangeType(1, 20)), '@psalm-type MyAlias = int<1, 20>'];
    }

    #[DataProvider('dataProvider')]
    public function testToString(TagInterface $tag, string $expected): void
    {
        self::assertEquals($expected, (string) $tag);
    }
}
