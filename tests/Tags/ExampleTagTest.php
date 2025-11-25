<?php

declare(strict_types=1);

namespace ArgoTest\DocBlockParser\Tags;

use Argo\DocBlockParser\Tags\ExampleTag;
use Argo\DocBlockParser\Tags\TagInterface;
use ArgoTest\DocBlockParser\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(ExampleTag::class)]
class ExampleTagTest extends TestCase
{
    public static function dataProvider(): iterable
    {
        yield [new ExampleTag(), '@example'];
        yield [new ExampleTag('Description'), '@example Description'];
    }

    #[DataProvider('dataProvider')]
    public function testToString(TagInterface $tag, string $expected): void
    {
        self::assertEquals($expected, (string) $tag);
    }
}
