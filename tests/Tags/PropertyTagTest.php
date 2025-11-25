<?php

declare(strict_types=1);

namespace ArgoTest\DocBlockParser\Tags;

use Argo\DocBlockParser\Tags\PropertyTag;
use Argo\DocBlockParser\Tags\TagInterface;
use Argo\Types\Atomic\StringType;
use ArgoTest\DocBlockParser\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(PropertyTag::class)]
class PropertyTagTest extends TestCase
{
    public static function dataProvider(): iterable
    {
        yield [new PropertyTag('name', new StringType()), '@property string $name'];
        yield [new PropertyTag('name', new StringType(), description: 'Hello'), '@property string $name Hello'];
        yield [new PropertyTag('name', new StringType(), isReadOnly: true), '@property-read string $name'];
        yield [new PropertyTag('name', new StringType(), isWriteOnly: true), '@property-write string $name'];
        yield [new PropertyTag('name', new StringType(), true, true, description: 'Hello'), '@property-read string $name Hello'];
    }

    #[DataProvider('dataProvider')]
    public function testToString(TagInterface $tag, string $expected): void
    {
        self::assertEquals($expected, (string) $tag);
    }
}
