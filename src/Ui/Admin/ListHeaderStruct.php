<?php

namespace RavingDev\BxCoreStructs\Ui\Admin;

use RavingDev\BxCoreStructs\AbstractStruct;
use RavingDev\CaseConverter\CaseEnum;

/**
 * @method $this id(string|void $v)
 * @method $this content(string|void $v)
 * @method $this sort(string|void $v)
 * @method $this default(bool|void $v)
 * @method $this align(string|void $v) "left"|"center"|"right"
 */
class ListHeaderStruct extends AbstractStruct
{
    protected const KEY_CASE = CaseEnum::SNAKE;

    protected function __setId(string $value): void
    {
        $this->id = $value;
        $this->content($value);
    }
}
