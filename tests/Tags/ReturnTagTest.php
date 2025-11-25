<?php

declare(strict_types=1);

namespace ArgoTest\DocBlockParser\Tags;

use Argo\DocBlockParser\Tags\ReturnTag;
use Argo\DocBlockParser\Tags\TagInterface;
use Argo\Types\Atomic\StringType;
use ArgoTest\DocBlockParser\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(ReturnTag::class)]
class ReturnTagTest extends TestCase
{
    public static function dataProvider(): iterable
    {
        yield [new ReturnTag(new StringType()), '@return string'];
        yield [new ReturnTag(new StringType(), 'Hello'), '@return string Hello'];
    }

    #[DataProvider('dataProvider')]
    public function testToString(TagInterface $tag, string $expected): void
    {
        self::assertEquals($expected, (string) $tag);
    }
}
