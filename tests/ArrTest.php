<?php

use PHPUnit\Framework\TestCase;

use Mingalevme\Utils\Arr;

class ArrTest extends TestCase
{
    public function testGetObjectWithKey()
    {
        $input = [
            [
                'foo1' => 'bar1',
                'bar1' => 'foo1',
            ],
            [
                'foo2' => 'bar2',
                'bar2' => 'foo2',
            ],
            [
                'foo3' => 'bar3',
                'bar3' => 'foo3',
            ],
        ];

        $this->assertSame(['foo2' => 'bar2', 'bar2' => 'foo2'],
            Arr::getObjectWithKey($input, 'bar2'));
    }

    public function testHasObjectWithKey()
    {
        $input = [
            [
                'foo1' => 'bar1',
                'bar1' => 'foo1',
            ],
            [
                'foo2' => 'bar2',
                'bar2' => 'foo2',
            ],
            [
                'foo3' => 'bar3',
                'bar3' => 'foo3',
            ],
        ];
        $this->assertTrue(Arr::hasObjectWithKey($input, 'bar2'));
        $this->assertFalse(Arr::hasObjectWithKey($input, 'bar4'));
    }

    public function testGetObjectWithKeyAndValue()
    {
        $input = [
            [
                'foo1' => 'bar1',
                'bar1' => 'foo1',
            ],
            [
                'foo2' => 'bar2',
                'bar2' => 'foo2',
            ],
            [
                'foo3' => 'bar3',
                'bar3' => 'foo3',
            ],
        ];

        $this->assertSame(['foo2' => 'bar2', 'bar2' => 'foo2'],
            Arr::getObjectWithKeyAndValue($input, 'bar2', 'foo2'));
    }

    public function testHasObjectWithKeyAndValue()
    {
        $input = [
            [
                'foo1' => 'bar1',
                'bar1' => 'foo1',
            ],
            [
                'foo2' => 'bar2',
                'bar2' => 'foo2',
            ],
            [
                'foo3' => 'bar3',
                'bar3' => 'foo3',
            ],
        ];
        $this->assertTrue(Arr::hasObjectWithKeyAndValue($input, 'bar2', 'foo2'));
        $this->assertFalse(Arr::hasObjectWithKeyAndValue($input, 'bar4', 'foo4'));
    }

    public function testToString()
    {
        $this->assertSame('foo1: bar1, bar1: foo1', Arr::toString([
            'foo1' => 'bar1',
            'bar1' => 'foo1'
        ], ': ', ', '));
    }

    public function testRename()
    {
        $array = [
            'foo1' => 'bar1',
            'bar1' => 'foo1'
        ];
        Arr::rename($array, 'bar1', 'bar2');
        $this->assertSame('foo1', $array['bar2']);
    }

    public function testPull()
    {
        $array = [
            'foo1' => 'bar1',
            'bar1' => 'foo1'
        ];
        $this->assertSame('foo1', Arr::pull($array, 'bar1'));
        $this->assertArrayNotHasKey('bar1', $array);
        $this->assertSame('foo2', Arr::pull($array, 'bar1', 'foo2'));
    }

    public function testCompress()
    {
        $input = [
            'key1' => 'value1',
            'key2' => [
                'key21' => 'value21',
                'key22' => false,
                'key23' => [
                    'key231' => '',
                    'key232' => null,
                    'key233' => 'value233',
                ],
                'key24' => [
                    'key241' => '',
                    'key242' => null,
                    'key243' => false,
                    'key244' => [],
                ],
            ],
        ];

        $output = [
            'key1' => 'value1',
            'key2' => [
                'key21' => 'value21',
                'key23' => [
                    'key233' => 'value233',
                ],
            ],
        ];

        $this->assertSame($output, array_compress($input));
    }

    public function testFilter()
    {
        $input = [
            'key1' => 'value1',
            'key2' => [
                'key21' => 'value21',
                'key22' => false,
                'key23' => [
                    'key231' => '',
                    'key232' => null,
                    'key233' => 'value233',
                ],
                'key24' => [
                    'key241' => '',
                    'key242' => null,
                    'key243' => false,
                    'key244' => [],
                ],
            ],
        ];

        $output = [
            'key1' => 'value1',
            'key2' => [
                'key21' => 'value21',
                'key22' => false,
                'key23' => [],
                'key24' => [],
            ],
        ];

        $this->assertSame($output, Arr::filter($input, function($value, $key){
            return !preg_match('/^key\d{3}$/', $key);
        }));
    }
}
