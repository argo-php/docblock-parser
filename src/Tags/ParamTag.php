<?php

declare(strict_types=1);

namespace Argo\DocBlockParser\Tags;

use Argo\Types\TypeInterface;

/**
 * @api
 */
final readonly class ParamTag implements TagInterface
{
    public function __construct(
        public string $name,
        public TypeInterface $type,
        public bool $isReference = false,
        public bool $isVariadic = false,
        public ?string $description = null,
    ) {}

    public function __toString(): string
    {
        $result = '@param ' . (string) $this->type;

        if ($this->isVariadic) {
            $result .= ' ...';
        } else {
            $result .= ' ';
        }

        if ($this->isReference) {
            $result .= '&$' . $this->name;
        } else {
            $result .= '$' . $this->name;
        }

        if ($this->description !== null) {
            $result .= ' ' . $this->description;
        }

        return $result;
    }
}
