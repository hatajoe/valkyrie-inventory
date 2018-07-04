<?php
/**
 * Created by PhpStorm.
 * User: hatajoe
 * Date: 2018/07/04
 * Time: 17:15
 */

namespace Valkyrie\Inventory;


class UniqueObjectManipulator
{
    /**
     * @var
     */
    private $repository;

    /**
     * Manipulator constructor.
     * @param UniqueObjectRepository $repository
     */
    public function __construct(UniqueObjectRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int ...$id
     * @return UniqueObjectCollection
     * @throws \Exception
     */
    public function findById(int ...$id): UniqueObjectCollection
    {
        return $this->repository->findById(...$id);
    }

    /**
     * @return UniqueObjectCollection
     * @throws \Exception
     */
    public function findByType(): UniqueObjectCollection
    {
        return $this->repository->findByType();
    }

    /**
     * @param UniqueObject ...$items
     * @throws \Exception
     */
    public function store(UniqueObject ...$items)
    {
        $this->repository->store(...$items);
    }
}