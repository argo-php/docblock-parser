<?php

declare(strict_types=1);

namespace Argo\DocBlockParser\Tags;

use Argo\Types\TypeInterface;

/**
 * @api
 */
final readonly class MethodTag implements TagInterface
{
    /**
     * @param array<MethodParameter> $parameters
     */
    public function __construct(
        public string $name,
        public bool $isStatic = false,
        public array $parameters = [],
        public ?TypeInterface $returnType = null,
        public ?string $description = null,
    ) {}

    public function __toString(): string
    {
        $result = '@method';

        if ($this->isStatic) {
            $result .= ' static';
        }

        if ($this->returnType !== null) {
            $result .= ' ' . (string) $this->returnType;
        }

        $parameters = array_map(fn(MethodParameter $parameter) => (string) $parameter, $this->parameters);

        $result .= ' ' . $this->name . '(' . implode(', ', $parameters) . ')';

        if ($this->description !== null) {
            $result .= ' ' . $this->description;
        }

        return $result;
    }
}
