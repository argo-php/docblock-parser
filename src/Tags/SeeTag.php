<?php

declare(strict_types=1);

namespace Argo\DocBlockParser\Tags;

/**
 * @api
 */
final readonly class SeeTag implements TagInterface
{
    public function __construct(
        public ?string $link = null,
    ) {}

    public function __toString(): string
    {
        return '@see' . ($this->link !== null ? ' ' . $this->link : '');
    }
}
