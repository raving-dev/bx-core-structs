<?php
namespace RavingDev\BxCoreStructs;

use ArrayAccess;
use RavingDev\CaseConverter\CaseConverter;
use RavingDev\CaseConverter\CaseEnum;

abstract class AbstractStruct implements ArrayAccess
{
    protected const KEY_CASE = CaseEnum::CONSTANT;

    public function __construct(array $data = [])
    {
        foreach ($data as $k => $v) {
            $this->$k = $v;
        }
    }

    public static function c(array $data = []): static
    {
        return new static($data);
    }

    protected function _key(string $key): string
    {
        return CaseConverter::toCase(static::KEY_CASE, $key);
    }

    /**
     * @inheritDoc
     */
    public function offsetExists(mixed $offset): bool
    {
        return property_exists($this, $this->_key($offset));
    }

    /**
     * @inheritDoc
     */
    public function offsetGet(mixed $offset): mixed
    {
        $key = $this->_key($offset);
        return $this->$key;
    }

    /**
     * @inheritDoc
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $key = $this->_key($offset);
        $this->$key = $value;
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset(mixed $offset): void
    {
        $key = $this->_key($offset);
        unset($this->$key);
    }

    public function __get(string $name): mixed
    {
        return $this->offsetGet($name);
    }

    public function __set(string $name, mixed $value): void
    {
        $this->offsetSet($name, $value);
    }

    public function __isset(string $name): bool
    {
        return $this->offsetExists($name);
    }

    public function __call(string $name, array $arguments): mixed
    {
        if (count($arguments) === 0) {
            return $this->offsetGet($name);
        }

        $this->offsetSet($name, $arguments[0]);

        return $this;
    }
}
