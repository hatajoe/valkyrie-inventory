<?php
/**
 * Created by PhpStorm.
 * User: hatajoe
 * Date: 2018/07/06
 * Time: 19:55
 */

namespace Example;


use \Valkyrie\Inventory;
use Valkyrie\Inventory\CountableObject;

class Item implements Inventory\CountableObject
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $type;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var int
     */
    private $maxQuantity;

    public function __construct(string $id, int $type, int $num, int $maxQuantity)
    {
        $this->id = $id;
        $this->type = $type;
        $this->quantity = $num;
        $this->maxQuantity = $maxQuantity;
    }

    /**
     * @param CountableObject $item
     * @return bool
     */
    public function isEqualsTo(CountableObject $item): bool
    {
        return $this->type === $item->getType();
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return int
     */
    public function getMaxQuantity(): int
    {
        return $this->maxQuantity;
    }

    /**
     * @param int $quantity
     * @return mixed
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
        return;
    }
}