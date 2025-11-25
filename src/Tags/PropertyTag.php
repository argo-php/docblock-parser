<?php

declare(strict_types=1);

namespace Argo\DocBlockParser\Tags;

use Argo\Types\TypeInterface;

/**
 * @api
 */
final readonly class PropertyTag implements TagInterface
{
    public function __construct(
        public string $name,
        public TypeInterface $type,
        public bool $isReadOnly = false,
        public bool $isWriteOnly = false,
        public ?string $description = null,
    ) {}

    public function __toString(): string
    {
        if ($this->isReadOnly) {
            $result = '@property-read ';
        } elseif ($this->isWriteOnly) {
            $result = '@property-write ';
        } else {
            $result = '@property ';
        }

        $result .= (string) $this->type . ' $' . $this->name;

        if ($this->description !== null) {
            $result .= ' ' . $this->description;
        }

        return $result;
    }
}
