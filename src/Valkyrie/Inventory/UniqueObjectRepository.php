<?php
/**
 * Created by PhpStorm.
 * User: hatajoe
 * Date: 2018/07/04
 * Time: 17:38
 */

namespace Valkyrie\Inventory;


interface UniqueObjectRepository
{
    /**
     * @param int ...$id
     * @return UniqueObjectCollection
     * @throws \Exception
     */
    public function findById(int ...$id): UniqueObjectCollection;

    /**
     * @return UniqueObjectCollection
     * @throws \Exception
     */
    public function findByType(): UniqueObjectCollection;

    /**
     * @param UniqueObject ...$item
     * @return mixed
     * @throws \Exception
     */
    public function store(UniqueObject ...$item);
}