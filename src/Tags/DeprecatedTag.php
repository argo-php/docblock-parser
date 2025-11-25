<?php

declare(strict_types=1);

namespace Argo\DocBlockParser\Tags;

/**
 * @api
 */
final readonly class DeprecatedTag implements TagInterface
{
    public function __construct(
        public ?string $description = null,
    ) {}

    public function __toString(): string
    {
        return '@deprecated' . ($this->description !== null ? ' ' . $this->description : '');
    }
}
