<?php

declare(strict_types=1);

namespace Argo\DocBlockParser\Tags;

use Argo\Types\TypeInterface;

/**
 * @api
 */
final readonly class ReturnTag implements TagInterface
{
    public function __construct(
        public TypeInterface $type,
        public ?string $description = null,
    ) {}

    public function __toString(): string
    {
        $result = '@return ' . (string) $this->type;

        if ($this->description !== null) {
            $result .= ' ' . $this->description;
        }

        return $result;
    }
}
