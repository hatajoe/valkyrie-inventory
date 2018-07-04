<?php
/**
 * Created by PhpStorm.
 * User: hatajoe
 * Date: 2018/07/06
 * Time: 19:01
 */

namespace Example;


class UnitParameter
{
    /**
     * @var int
     */
    public $atk;

    /**
     * @var int
     */
    public $def;

    /**
     * UnitParameter constructor.
     * @param string $name
     * @param int $atk
     * @param int $def
     */
    public function __construct(int $atk, int $def)
    {
        $this->atk = $atk;
        $this->def = $def;
    }
}