<?php

declare(strict_types=1);

namespace Argo\DocBlockParser\Tags;

/**
 * @api
 */
final readonly class ExampleTag implements TagInterface
{
    public function __construct(
        public ?string $example = null,
    ) {}

    public function __toString(): string
    {
        return '@example' . ($this->example !== null ? ' ' . $this->example : '');
    }
}
