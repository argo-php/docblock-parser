<?php

declare(strict_types=1);

namespace Argo\DocBlockParser\Tags;

/**
 * @api
 */
final readonly class ApiTag implements TagInterface
{
    public function __toString(): string
    {
        return '@api';
    }
}
