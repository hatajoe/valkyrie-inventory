<?php
/**
 * Created by PhpStorm.
 * User: hatajoe
 * Date: 2018/07/06
 * Time: 19:22
 */

require_once __DIR__ . "/../vendor/autoload.php";

use \Valkyrie\Inventory;

function example1()
{
    $manipulator = new Inventory\UniqueObjectManipulator(new Example\UnitRepository());
    try {
        $unitCollection = $manipulator->findByType();
        var_dump($unitCollection->toArray());
    } catch (\Exception $e) {
        echo $e;
    }
}

function example2()
{
    $manipulator = new Inventory\CountableObjectManipulator(new Example\ItemRepository());
    try {
        $itemCollection = $manipulator->findByType(Example\InventoryMasterData::TYPE_COIN);
        $item = $itemCollection->search(Example\InventoryMasterData::TYPE_COIN);
        var_dump($item);
        $manipulator->increase($item, 100);
        $manipulator->decrease($item, 20);
        $manipulator->store($item);
        $itemCollection = $manipulator->findByType(Example\InventoryMasterData::TYPE_COIN);
        $item = $itemCollection->search(Example\InventoryMasterData::TYPE_COIN);
        var_dump($item);
        $manipulator->decrease($item, 100);
    } catch (\Exception $e) {
        echo $e;
    }
}

example1();
example2();

