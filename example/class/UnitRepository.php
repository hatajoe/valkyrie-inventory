<?php
/**
 * Created by PhpStorm.
 * User: hatajoe
 * Date: 2018/07/06
 * Time: 18:25
 */

namespace Example;


use Valkyrie\Inventory;

class UnitRepository implements Inventory\UniqueObjectRepository
{
    /**
     * @param int ...$id
     * @return Inventory\UniqueObjectCollection
     * @throws \Exception
     */
    public function findById(int ...$id): Inventory\UniqueObjectCollection
    {
        $collection = new Inventory\UniqueObjectCollection();
        foreach (InventoryUserData::$DATA as $inventory) {
            if (array_search($inventory["id"], $id) === false) {
                continue;
            }
            $unit = $this->buildUnit($inventory["id"]);
            if (!is_null($unit)) {
                $collection->append($unit);
            }
        }
        return $collection;
    }

    /**
     * @return Inventory\UniqueObjectCollection
     * @throws \Exception
     */
    public function findByType(): Inventory\UniqueObjectCollection
    {
        $collection = new Inventory\UniqueObjectCollection();
        foreach (InventoryUserData::$DATA as $inventory) {
            if ($inventory["inventory_type"] !== InventoryMasterData::TYPE_UNIT) {
                continue;
            }
            $unit = $this->buildUnit($inventory["id"]);
            if (!is_null($unit)) {
                $collection->append($unit);
            }
        }
        return $collection;
    }

    /**
     * @param Inventory\UniqueObject ...$item
     * @return mixed
     * @throws \Exception
     */
    public function store(Inventory\UniqueObject ...$item)
    {
        // Do nothing
        return;
    }

    /**
     * @param string $id
     * @return null|Inventory\UniqueObject
     */
    private function buildUnit(string $id): ?Inventory\UniqueObject
    {
        foreach (UnitParameterUserData::$DATA as $param) {
            if ($param["inventory_id"] !== $id) {
                continue;
            }
            $unitParameter = new UnitParameter($param["atk"], $param["def"]);
            return new Unit($id, InventoryMasterData::TYPE_UNIT, $unitParameter);
        }
        return null;
    }
}