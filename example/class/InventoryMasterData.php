<?php
/**
 * Created by PhpStorm.
 * User: hatajoe
 * Date: 2018/07/06
 * Time: 19:20
 */

namespace Example;


class InventoryMasterData
{
    const TYPE_COIN   = 1 << 0;
    const TYPE_GEM    = 1 << 1;
    const TYPE_UNIT   = 1 << 2;
    const TYPE_WEAPON = 1 << 3;
}