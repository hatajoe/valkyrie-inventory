<?php
/**
 * Created by PhpStorm.
 * User: hatajoe
 * Date: 2018/07/04
 * Time: 17:31
 */

namespace Valkyrie\Inventory;


interface CountableObjectRepository
{
    /**
     * @param int ...$type
     * @return CountableObjectCollection
     * @throws \Exception
     */
    public function findByType(int ...$type): CountableObjectCollection;

    /**
     * @param CountableObject ...$items
     * @return mixed
     * @throws \Exception
     */
    public function store(CountableObject ...$items);
}