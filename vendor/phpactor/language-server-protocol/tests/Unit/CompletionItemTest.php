<?php

namespace Phpactor\LanguageServerProtocol\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Phpactor\LanguageServerProtocol\Command;
use Phpactor\LanguageServerProtocol\Position;
use Phpactor\LanguageServerProtocol\Range;
use Phpactor\LanguageServerProtocol\TextEdit;
use Phpactor\LanguageServerProtocol\MarkupContent;
use Phpactor\LanguageServerProtocol\CompletionItem;
use RuntimeException;

class CompletionItemTest extends TestCase
{
    public function testExeptionOnUnknownKey(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Parameter "foobar"');
        CompletionItem::fromArray([
            'label' => 'Barfoo',
            'foobar' => 'barfoo'
        ]);
    }

    public function testIgnoreUnknownFields(): void
    {
        $item = CompletionItem::fromArray([
            'label' => 'Barfoo',
            'foobar' => 'barfoo'
        ], true);

        self::assertEquals('Barfoo', $item->label);
    }

    public function testNull(): void
    {
        $item = CompletionItem::fromArray([
            'tags' => null,
            'label' => 'Barfoo',
            'foobar' => 'barfoo'
        ], true);

        self::assertEquals('Barfoo', $item->label);
    }

    public function testIterableNull(): void
    {
        $item = CompletionItem::fromArray([
            'additionalTextEdits' => null,
            'label' => 'Barfoo',
            'foobar' => 'barfoo'
        ], true);

        self::assertEquals('Barfoo', $item->label);
    }


    public function testFromArray(): void
    {
        $item = CompletionItem::fromArray([
            'label' => 'Foobar',
            'kind' => 1,
            'detail' => 'This is foobar',
            'documentation' => [
                'kind' => 'markdown',
                'value' => 'Foobar',
            ],
            'additionalTextEdits' => [
                [
                    'range' => [
                        'start' => [
                            'line' => 5,
                            'character' => 10,
                        ],
                        'end' => [
                            'line' => 10,
                            'character' => 10,
                        ],
                    ],
                    'newText' => 'Foobar',
                ],
            ],
            'command' => [
                'title' => 'Foobar',
                'command' => 'my.command',
            ],
        ]);
        $item = new CompletionItem('Foobar');
        $item->kind = 1;
        $item->detail = 'This is foobar';
        $item->documentation = new MarkupContent('markdown', 'Foobar');
        $item->additionalTextEdits = [
            new TextEdit(
                new Range(
                    new Position(5, 10),
                    new Position(10, 10),
                ),
                'Foobar'
            )
        ];
        $item->command = new Command('Foobar', 'my.command');
    }
}
