<?php

declare(strict_types=1);

namespace Argo\DocBlockParser\Tags;

/**
 * @api
 */
final readonly class VersionTag implements TagInterface
{
    public function __construct(
        public ?string $description = null,
    ) {}

    public function __toString(): string
    {
        return '@version' . ($this->description !== null ? ' ' . $this->description : '');
    }
}
