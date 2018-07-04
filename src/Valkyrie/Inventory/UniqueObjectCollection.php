<?php
/**
 * Created by PhpStorm.
 * User: hatajoe
 * Date: 2018/07/04
 * Time: 18:10
 */

namespace Valkyrie\Inventory;


class UniqueObjectCollection implements \IteratorAggregate
{
    /**
     * @var UniqueObject[]
     */
    private $items;

    public function __construct(UniqueObject ...$items)
    {
        $this->items = $items;
    }

    /**
     * @return \Generator|\Traversable
     */
    public function getIterator()
    {
        foreach ($this->items as $key => $val) {
            yield $key => $val;
        }
    }

    /**
     * @param int $id
     * @return null|UniqueObject
     */
    public function search(int $id): ?UniqueObject
    {
        foreach ($this->items as $item) {
            if ($item->getIdentifier() == $id) {
                return $item;
            }
        }
        return null;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return count($this->items);
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    /**
     * @param UniqueObject $item
     */
    public function append(UniqueObject $item)
    {
        $this->items[] = $item;
    }

    /**
     * @return UniqueObject[]
     */
    public function toArray(): array
    {
        return $this->items;
    }
}