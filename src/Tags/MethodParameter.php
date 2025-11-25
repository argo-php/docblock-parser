<?php

declare(strict_types=1);

namespace Argo\DocBlockParser\Tags;

use Argo\Types\TypeInterface;

/**
 * @api
 */
final readonly class MethodParameter implements \Stringable
{
    public function __construct(
        public string $name,
        public ?TypeInterface $type = null,
        public bool $isReference = false,
        public bool $isVariadic = false,
        public ?ValueConst $defaultValue = null,
        public ?string $description = null,
    ) {}

    public function __toString(): string
    {
        $result = $this->type !== null ? (string) $this->type . ' ' : '';

        if ($this->isVariadic) {
            $result .= '...';
        }

        if ($this->isReference) {
            $result .= '&$' . $this->name;
        } else {
            $result .= '$' . $this->name;
        }

        if ($this->defaultValue !== null) {
            $result .= ' = ' . (string) $this->defaultValue;
        }

        return $result;
    }
}
