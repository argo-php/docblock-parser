# argo/docblock-parser

PHPDoc parser. Unlike existing solutions, it immediately returns types in package format
[argo-php/types](https://github.com/argo-php/types).

## Usage

Parsing PHPDoc from a string:
```php
use Argo\DocBlockParser\Parser;
use Argo\DocBlockParser\Context\ContextFactory;
use Argo\DocBlockParser\PhpDocFactory;

$phpDocParser = new Parser();
$phpDoc = $phpDocParser->parse('/** @var string $hello */');
```

Getting all PHPDoc tags from reflection:
```php
use Argo\DocBlockParser\Parser;
use Argo\DocBlockParser\Context\ContextFactory;
use Argo\DocBlockParser\PhpDocFactory;

$phpDocFactory = new PhpDocFactory(new Parser(), new ContextFactory());

$reflection = new \ReflectionClass('MyClassWithPhpDoc');
$phpDoc = $phpDocFactory->getPhpDocFromReflector($reflection);
```
