<?php
/**
 * Created by PhpStorm.
 * User: hatajoe
 * Date: 2018/07/04
 * Time: 16:58
 */

namespace Valkyrie\Inventory;


interface CountableObject
{
    /**
     * @param CountableObject $item
     * @return bool
     */
    public function isEqualsTo(CountableObject $item): bool;

    /**
     * @return int
     */
    public function getType(): int;

    /**
     * @return int
     */
    public function getQuantity(): int;

    /**
     * @return int
     */
    public function getMaxQuantity(): int;

    /**
     * @param int $quantity
     * @return mixed
     */
    public function setQuantity(int $quantity);
}