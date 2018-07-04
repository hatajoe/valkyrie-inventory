<?php
/**
 * Created by PhpStorm.
 * User: hatajoe
 * Date: 2018/07/06
 * Time: 18:25
 */

namespace Example;


use Valkyrie\Inventory;

class ItemRepository implements Inventory\CountableObjectRepository
{
    /**
     * @param int ...$id
     * @return Inventory\CountableObjectCollection
     * @throws \Exception
     */
    public function findById(int ...$id): Inventory\CountableObjectCollection
    {
        $collection = new Inventory\CountableObjectCollection();
        foreach (InventoryUserData::$DATA as $inventory) {
            if (array_search($inventory["id"], $id) === false) {
                continue;
            }
            $item = $this->buildItem($inventory);
            if (!is_null($item)) {
                $collection->append($item);
            }
        }
        return $collection;
    }

    /**
     * @param int ...$type
     * @return Inventory\CountableObjectCollection
     * @throws \Exception
     */
    public function findByType(int ...$type): Inventory\CountableObjectCollection
    {
        $collection = new Inventory\CountableObjectCollection();
        foreach (InventoryUserData::$DATA as $inventory) {
            if (array_search($inventory["inventory_type"], $type) === false) {
                continue;
            }
            $item = $this->buildItem($inventory);
            if (!is_null($item)) {
                $collection->append($item);
            }
        }
        return $collection;
    }

    /**
     * @param Inventory\CountableObject ...$item
     * @return mixed
     * @throws \Exception
     */
    public function store(Inventory\CountableObject ...$item)
    {
        foreach ($item as $i) {
            foreach (InventoryUserData::$DATA as $idx => $inventory) {
                if ($i->getType() == $inventory["inventory_type"]) {
                    InventoryUserData::$DATA[$idx]["num"] = $i->getQuantity();
                }
            }
        }
        return;
    }

    /**
     * @param array $inventory
     * @return Inventory\CountableObject
     */
    private function buildItem(array $inventory): Inventory\CountableObject
    {
        return new Item($inventory["id"], $inventory["inventory_type"], $inventory["num"], 9999);
    }
}