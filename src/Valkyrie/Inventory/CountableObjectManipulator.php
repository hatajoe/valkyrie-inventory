<?php
/**
 * Created by PhpStorm.
 * User: hatajoe
 * Date: 2018/07/04
 * Time: 17:15
 */

namespace Valkyrie\Inventory;


class CountableObjectManipulator
{
    /**
     * @var CountableObjectRepository
     */
    private $repository;

    /**
     * Manipulator constructor.
     * @param CountableObjectRepository $countableObjectRepository
     */
    public function __construct(CountableObjectRepository $countableObjectRepository)
    {
        $this->repository = $countableObjectRepository;
    }

    /**
     * @param CountableObject $item
     * @param int $quantity
     */
    public function increase(CountableObject $item, int $quantity)
    {
        $item->setQuantity(min($item->getMaxQuantity(), $item->getQuantity() + $quantity));
    }

    /**
     * @param CountableObject $item
     * @param int $quantity
     * @throws InvalidCountException
     */
    public function decrease(CountableObject $item, int $quantity)
    {
        $remain = $item->getQuantity() - $quantity;
        if ($remain < 0) {
            throw new InvalidCountException();
        }
        $item->setQuantity($remain);
    }

    /**
     * @param int ...$type
     * @return CountableObjectCollection
     * @throws \Exception
     */
    public function findByType(int ...$type): CountableObjectCollection
    {
        return $this->repository->findByType(...$type);
    }

    /**
     * @param CountableObject ...$items
     * @throws \Exception
     */
    public function store(CountableObject ...$items)
    {
        $this->repository->store(...$items);
    }
}