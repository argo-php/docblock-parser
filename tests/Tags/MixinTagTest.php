<?php

declare(strict_types=1);

namespace ArgoTest\DocBlockParser\Tags;

use Argo\DocBlockParser\Tags\MixinTag;
use Argo\DocBlockParser\Tags\TagInterface;
use Argo\Types\Atomic\ClassType;
use ArgoTest\DocBlockParser\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(MixinTag::class)]
class MixinTagTest extends TestCase
{
    public static function dataProvider(): iterable
    {
        yield [new MixinTag(new ClassType('HelloClass')), '@mixin HelloClass'];
        yield [new MixinTag(new ClassType('HelloClass'), 'Description'), '@mixin HelloClass Description'];
    }

    #[DataProvider('dataProvider')]
    public function testToString(TagInterface $tag, string $expected): void
    {
        self::assertEquals($expected, (string) $tag);
    }
}
