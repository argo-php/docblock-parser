<?php

declare(strict_types=1);

namespace ArgoTest\DocBlockParser\Tags;

use Argo\DocBlockParser\Tags\ValueConst;
use ArgoTest\DocBlockParser\TestCase;
use PHPStan\PhpDocParser\Ast\ConstExpr\ConstExprArrayItemNode;
use PHPStan\PhpDocParser\Ast\ConstExpr\ConstExprArrayNode;
use PHPStan\PhpDocParser\Ast\ConstExpr\ConstExprFalseNode;
use PHPStan\PhpDocParser\Ast\ConstExpr\ConstExprIntegerNode;
use PHPStan\PhpDocParser\Ast\ConstExpr\ConstExprNullNode;
use PHPStan\PhpDocParser\Ast\ConstExpr\ConstExprStringNode;
use PHPStan\PhpDocParser\Ast\ConstExpr\ConstExprTrueNode;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(ValueConst::class)]
class ValueConstTest extends TestCase
{
    public static function dataProvider(): iterable
    {
        yield [new ValueConst(new ConstExprStringNode('Hello', ConstExprStringNode::SINGLE_QUOTED)), "'Hello'"];
        yield [new ValueConst(new ConstExprIntegerNode('123')), '123'];
        yield [new ValueConst(new ConstExprArrayNode([])), '[]'];
        yield [
            new ValueConst(
                new ConstExprArrayNode([
                    new ConstExprArrayItemNode(null, new ConstExprStringNode('Foo', ConstExprStringNode::SINGLE_QUOTED)),
                    new ConstExprArrayItemNode(null, new ConstExprStringNode('Bar', ConstExprStringNode::SINGLE_QUOTED)),
                ]),
            ),
            "['Foo', 'Bar']",
        ];
        yield [
            new ValueConst(
                new ConstExprArrayNode([
                    new ConstExprArrayItemNode(
                        new ConstExprStringNode('foo', ConstExprStringNode::SINGLE_QUOTED),
                        new ConstExprStringNode('Foo', ConstExprStringNode::SINGLE_QUOTED),
                    ),
                    new ConstExprArrayItemNode(
                        new ConstExprStringNode('bar', ConstExprStringNode::SINGLE_QUOTED),
                        new ConstExprStringNode('Bar', ConstExprStringNode::SINGLE_QUOTED),
                    ),
                ]),
            ),
            "['foo' => 'Foo', 'bar' => 'Bar']",
        ];
        yield [new ValueConst(new ConstExprNullNode()), 'null'];
        yield [new ValueConst(new ConstExprTrueNode()), 'true'];
        yield [new ValueConst(new ConstExprFalseNode()), 'false'];
    }

    #[DataProvider('dataProvider')]
    public function testToString(ValueConst $const, string $expected): void
    {
        self::assertEquals($expected, (string) $const);
    }
}
