<?php

declare(strict_types=1);

namespace ArgoTest\DocBlockParser\Tags;

use Argo\DocBlockParser\Tags\TagInterface;
use Argo\DocBlockParser\Tags\UnknownTag;
use ArgoTest\DocBlockParser\TestCase;
use PHPStan\PhpDocParser\Ast\ConstExpr\ConstExprStringNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\SelfOutTagValueNode;
use PHPStan\PhpDocParser\Ast\Type\ConstTypeNode;
use PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(UnknownTag::class)]
class UnknownTagTest extends TestCase
{
    public static function dataProvider(): iterable
    {
        yield [
            new UnknownTag(
                'custom',
                new SelfOutTagValueNode(new IdentifierTypeNode('string'), 'Hello'),
            ),
            '@custom string Hello',
        ];
    }

    #[DataProvider('dataProvider')]
    public function testToString(TagInterface $tag, string $expected): void
    {
        self::assertEquals($expected, (string) $tag);
    }
}
