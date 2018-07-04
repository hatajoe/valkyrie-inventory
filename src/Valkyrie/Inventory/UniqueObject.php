<?php
/**
 * Created by PhpStorm.
 * User: hatajoe
 * Date: 2018/07/04
 * Time: 16:43
 */

namespace Valkyrie\Inventory;


interface UniqueObject
{
    /**
     * @return string
     */
    public function getIdentifier(): string;

    /**
     * @param UniqueObject $item
     * @return bool
     */
    public function isEqualsTo(UniqueObject $item): bool;

    /**
     * @return int
     */
    public function getType(): int;
}