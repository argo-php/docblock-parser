<?php

declare(strict_types=1);

namespace Argo\DocBlockParser\Tags;

use Argo\Types\TypeInterface;

final readonly class TypeAliasTag implements TagInterface
{
    public function __construct(
        public string $name,
        public TypeInterface $type,
    ) {}

    public function __toString(): string
    {
        return '@psalm-type ' . $this->name . ' = ' . (string) $this->type;
    }
}
