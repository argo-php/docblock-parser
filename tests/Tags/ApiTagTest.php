<?php

declare(strict_types=1);

namespace ArgoTest\DocBlockParser\Tags;

use Argo\DocBlockParser\Tags\ApiTag;
use Argo\DocBlockParser\Tags\TagInterface;
use ArgoTest\DocBlockParser\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(ApiTag::class)]
class ApiTagTest extends TestCase
{
    public static function dataProvider(): iterable
    {
        yield [new ApiTag(), '@api'];
    }

    #[DataProvider('dataProvider')]
    public function testToString(TagInterface $tag, string $expected): void
    {
        self::assertEquals($expected, (string) $tag);
    }
}
