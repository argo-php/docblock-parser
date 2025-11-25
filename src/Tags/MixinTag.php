<?php

declare(strict_types=1);

namespace Argo\DocBlockParser\Tags;

use Argo\Types\TypeInterface;

/**
 * @api
 */
final readonly class MixinTag implements TagInterface
{
    public function __construct(
        public TypeInterface $type,
        public ?string $description = null,
    ) {}

    public function __toString(): string
    {
        return '@mixin ' . (string) $this->type . ($this->description !== null ? ' ' . $this->description : '');
    }
}
