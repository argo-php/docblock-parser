<?php

declare(strict_types=1);

namespace Argo\DocBlockParser\Tags;

use PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocTagValueNode;

/**
 * @api
 */
final readonly class UnknownTag implements TagInterface
{
    public function __construct(
        public string $name,
        public PhpDocTagValueNode $value,
    ) {}

    public function __toString(): string
    {
        return '@' . $this->name . ' ' . (string) $this->value;
    }
}
