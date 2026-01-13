<?php

namespace RavingDev\BxCoreStructs\Ui\Admin;

use Bitrix\Main\UI\Filter\DateType;
use RavingDev\BxCoreStructs\AbstractStruct;
use RavingDev\CaseConverter\CaseEnum;

/**
 * @method $this|string id(string|void $v = null)
 * @method $this|string name(string|void $v = null)
 * @method $this|bool default(bool|void $v = null)
 * @method $this|string type(string|void $v = null) "string"|"list"|"number"|"date"|"custom_date"|"checkbox"|"custom_entity"|"entity_selector"|"dest_selector"
 * @method $this|array<string, string> items(array<string, string>|void $v = null)
 * @method $this|array params(array|void $v = null)
 * @method $this|string[] exclude(string[]|void $v = null)
 * @see DateType consts
 *
 * @method $this|bool multiple(bool|void $v = null)
 */
class ListFilterStruct extends AbstractStruct
{
    public const TYPE_STRING = 'string';
    public const TYPE_LIST = 'list';
    public const TYPE_NUMBER = 'number';
    public const TYPE_DATE = 'custom_date';
    public const TYPE_CHECKBOX = 'checkbox';
    public const TYPE_CUSTOM_ENTITY = 'custom_entity';
    public const TYPE_ENTITY_SELECTOR = 'entity_selector';
    public const TYPE_DEST_SELECTOR = 'dest_selector';

    protected const KEY_CASE = CaseEnum::SNAKE;

    protected function __setMultiple($value): void
    {
        $this->params = $this->params ?? [];
        $this->params['multiple'] = $value ? 'Y' : 'N';
    }

    protected function __getMultiple(): bool
    {
        return ($this->params['multiple'] ?? null) === 'Y';
    }
}
