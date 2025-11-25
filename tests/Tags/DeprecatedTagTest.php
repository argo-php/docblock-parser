<?php

declare(strict_types=1);

namespace ArgoTest\DocBlockParser\Tags;

use Argo\DocBlockParser\Tags\DeprecatedTag;
use Argo\DocBlockParser\Tags\TagInterface;
use ArgoTest\DocBlockParser\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(DeprecatedTag::class)]
class DeprecatedTagTest extends TestCase
{
    public static function dataProvider(): iterable
    {
        yield [new DeprecatedTag(), '@deprecated'];
        yield [new DeprecatedTag('Description'), '@deprecated Description'];
    }

    #[DataProvider('dataProvider')]
    public function testToString(TagInterface $tag, string $expected): void
    {
        self::assertEquals($expected, (string) $tag);
    }
}
