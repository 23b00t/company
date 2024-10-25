<?php // Auto-generated from vscode-languageserver-protocol (typescript)

namespace Phpactor\LanguageServerProtocol;

use DTL\Invoke\Invoke;
use Exception;
use RuntimeException;

/**
 * Client Capabilities for a [DocumentSymbolRequest](#DocumentSymbolRequest).
 */
class DocumentSymbolClientCapabilities
{
    /**
     * Whether document symbol supports dynamic registration.
     *
     * @var bool|null
     */
    public $dynamicRegistration;

    /**
     * Specific capabilities for the `SymbolKind`.
     *
     * @var array<mixed>|null
     */
    public $symbolKind;

    /**
     * The client support hierarchical document symbols.
     *
     * @var bool|null
     */
    public $hierarchicalDocumentSymbolSupport;

    /**
     * The client supports tags on `SymbolInformation`. Tags are supported on
     * `DocumentSymbol` if `hierarchicalDocumentSymbolSupport` is set to true.
     * Clients supporting tags have to handle unknown tags gracefully.
     *
     * @var array<mixed>|null
     */
    public $tagSupport;

    /**
     * The client supports an additional label presented in the UI when
     * registering a document symbol provider.
     *
     * @var bool|null
     */
    public $labelSupport;

    /**
     * @param bool|null $dynamicRegistration
     * @param array<mixed>|null $symbolKind
     * @param bool|null $hierarchicalDocumentSymbolSupport
     * @param array<mixed>|null $tagSupport
     * @param bool|null $labelSupport
     */
    public function __construct(?bool $dynamicRegistration = null, ?array $symbolKind = null, ?bool $hierarchicalDocumentSymbolSupport = null, ?array $tagSupport = null, ?bool $labelSupport = null)
    {
        $this->dynamicRegistration = $dynamicRegistration;
        $this->symbolKind = $symbolKind;
        $this->hierarchicalDocumentSymbolSupport = $hierarchicalDocumentSymbolSupport;
        $this->tagSupport = $tagSupport;
        $this->labelSupport = $labelSupport;
    }

    /**
     * @param array<string,mixed> $array
     * @return self
     */
    public static function fromArray(array $array, bool $allowUnknownKeys = false): self
    {
        $map = [
            'dynamicRegistration' => ['names' => [], 'iterable' => false],
            'symbolKind' => ['names' => [], 'iterable' => false],
            'hierarchicalDocumentSymbolSupport' => ['names' => [], 'iterable' => false],
            'tagSupport' => ['names' => [], 'iterable' => false],
            'labelSupport' => ['names' => [], 'iterable' => false],
        ];

        foreach ($array as $key => &$value) {
            if (!isset($map[$key])) {
                if ($allowUnknownKeys) {
                    unset($array[$key]);
                    continue;
                }

                throw new RuntimeException(sprintf(
                    'Parameter "%s" on class "%s" not known, known parameters: "%s"',
                    $key, 
                    self::class,
                    implode('", "', array_keys($map))
                ));
            }

            // from here we only care about arrays that can be transformed into
            // objects
            if (!is_array($value)) {
                continue;
            }

            if (empty($map[$key]['names'])) {
                continue;
            }

            if ($map[$key]['iterable']) {
                $value = array_map(function ($object) use ($map, $key, $allowUnknownKeys) {
                    if (!is_array($object)) {
                        return $object;
                    }

                    return self::invokeFromNames($map[$key]['names'], $object, $allowUnknownKeys) ?: $object;
                }, $value);
                continue;
            }

            $names = $map[$key]['names'];
            $value = self::invokeFromNames($names, $value, $allowUnknownKeys) ?: $value;
        }
        
        return Invoke::new(self::class, $array);
    }

    /**
     * @param array<string> $classNames
     * @param array<string,mixed> $object
     */
    private static function invokeFromNames(array $classNames, array $object, bool $allowUnknownKeys): ?object
    {
        $lastException = null;
        foreach ($classNames as $className) {
            try {
                // @phpstan-ignore-next-line
                return call_user_func_array($className . '::fromArray', [$object, $allowUnknownKeys]);
            } catch (Exception $exception) {
                $lastException = $exception;
                continue;
            }
        }

        throw $lastException;
    }
        
}