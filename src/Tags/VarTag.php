<?php

declare(strict_types=1);

namespace Argo\DocBlockParser\Tags;

use Argo\Types\TypeInterface;

/**
 * @api
 */
final readonly class VarTag implements TagInterface
{
    public function __construct(
        public TypeInterface $type,
        public ?string $name = null,
        public ?string $description = null,
    ) {}

    public function __toString(): string
    {
        $result = '@var ' . (string) $this->type;

        if ($this->name !== null) {
            $result .= ' $' . $this->name;
        }

        if ($this->description !== null) {
            $result .= ' ' . $this->description;
        }

        return $result;
    }
}
