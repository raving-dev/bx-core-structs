<?php

use PHPUnit\Framework\TestCase;
use RavingDev\BxCoreStructs\Ui\Admin\ListFilterStruct;
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
            'ID' => 'test',
            'CONTENT' => 'Test',
        ]);

        $data->align = 'center';
        $data->sort = 'test_field';

        $this->assertEquals(
            ['id' => 'test', 'content' => 'Test', 'align' => 'center', 'sort' => 'test_field'],
            (array)$data
        );
    }

    public function testMagicSet(): void
    {
        $this->assertEquals(
            ['id' => 'test', 'content' => 'test'],
            (array)ListHeaderStruct::c()->id('test')
        );
    }

    public function testNestedMagic(): void
    {
        $struct = ListFilterStruct::c();

        // set
        $this->assertEquals(
            ['params' => ['multiple' => 'N']],
            (array)$struct->multiple(false)
        );
        $this->assertEquals(
            ['params' => ['multiple' => 'Y']],
            (array)$struct->multiple(true)
        );

        // get
        $this->assertTrue($struct->multiple());
    }
}
