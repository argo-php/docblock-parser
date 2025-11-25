<?php

declare(strict_types=1);

namespace ArgoTest\DocBlockParser\Tags;

use Argo\DocBlockParser\Tags\SourceTag;
use Argo\DocBlockParser\Tags\TagInterface;
use ArgoTest\DocBlockParser\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(SourceTag::class)]
class SourceTagTest extends TestCase
{
    public static function dataProvider(): iterable
    {
        yield [new SourceTag(), '@source'];
        yield [new SourceTag('Description'), '@source Description'];
    }

    #[DataProvider('dataProvider')]
    public function testToString(TagInterface $tag, string $expected): void
    {
        self::assertEquals($expected, (string) $tag);
    }
}
