<?php

namespace RavingDev\BxCoreStructs;

class Structs
{
    public static function array(array $data): array
    {
        return array_map(static fn($i) => (array)$i, $data);
    }
}
