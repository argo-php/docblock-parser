<?php

declare(strict_types=1);

namespace ArgoTest\DocBlockParser\Tags;

use Argo\DocBlockParser\Tags\TagInterface;
use Argo\DocBlockParser\Tags\VarTag;
use Argo\Types\Atomic\StringType;
use ArgoTest\DocBlockParser\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(VarTag::class)]
class VarTagTest extends TestCase
{
    public static function dataProvider(): iterable
    {
        yield [new VarTag(new StringType()), '@var string'];
        yield [new VarTag(new StringType(), 'name'), '@var string $name'];
        yield [new VarTag(new StringType(), description: 'Hello'), '@var string Hello'];
        yield [new VarTag(new StringType(), 'name', description: 'Hello'), '@var string $name Hello'];
    }

    #[DataProvider('dataProvider')]
    public function testToString(TagInterface $tag, string $expected): void
    {
        self::assertEquals($expected, (string) $tag);
    }
}
