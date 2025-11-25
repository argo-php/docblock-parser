<?php

declare(strict_types=1);

namespace ArgoTest\DocBlockParser\Tags;

use Argo\DocBlockParser\Tags\TagInterface;
use Argo\DocBlockParser\Tags\TypeAliasImportTag;
use ArgoTest\DocBlockParser\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(TypeAliasImportTag::class)]
class TypeAliasImportTagTest extends TestCase
{
    public static function dataProvider(): iterable
    {
        yield [
            new TypeAliasImportTag('MyAlias', 'ImportedType', 'FromClass'),
            '@psalm-import-type ImportedType from FromClass as MyAlias',
        ];

        yield [
            new TypeAliasImportTag('ImportedType', 'ImportedType', 'FromClass'),
            '@psalm-import-type ImportedType from FromClass',
        ];
    }

    #[DataProvider('dataProvider')]
    public function testToString(TagInterface $tag, string $expected): void
    {
        self::assertEquals($expected, (string) $tag);
    }
}
