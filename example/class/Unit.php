<?php
/**
 * Created by PhpStorm.
 * User: hatajoe
 * Date: 2018/07/06
 * Time: 18:59
 */

namespace Example;


use \Valkyrie\Inventory;

class Unit implements Inventory\UniqueObject
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
     * @var UnitParameter
     */
    private $param;

    public function __construct(string $id, int $type, UnitParameter $params)
    {
        $this->id = $id;
        $this->type = $type;
        $this->param = $params;
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->id;
    }

    /**
     * @param \Valkyrie\Inventory\UniqueObject $item
     * @return bool
     */
    public function isEqualsTo(\Valkyrie\Inventory\UniqueObject $item): bool
    {
        return $this->id === $item->getIdentifier();
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->param->name;
    }

    /**
     * @return int
     */
    public function getAtk(): int
    {
        return $this->param->atk;
    }

    /**
     * @return int
     */
    public function getDef(): int
    {
        return $this->param->def;
    }
}