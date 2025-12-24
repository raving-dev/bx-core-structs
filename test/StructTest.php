<?php

use PHPUnit\Framework\TestCase;
use RavingDev\BxCoreStructs\Ui\Admin\ListHeaderStruct;

require_once __DIR__ . '/bootstrap.php';

class StructTest extends TestCase
{
    public function testChain(): void
    {
        $this->assertEquals(
            ['id' => 'test', 'content' => 'Test', 'align' => 'center', 'sort' => 'test_field'],
            (array)ListHeaderStruct::c()
                ->id('test')
                ->content('Test')
                ->align('center')
                ->sort('test_field')
        );
    }

    public function testProps(): void
    {
        $data = new ListHeaderStruct([
            'CONTENT' => 'Test',
            'ID' => 'test',
        ]);

        $data->align = 'center';
        $data->sort = 'test_field';

        $this->assertEquals(
            ['id' => 'test', 'content' => 'Test', 'align' => 'center', 'sort' => 'test_field'],
            (array)$data
        );
    }
}
