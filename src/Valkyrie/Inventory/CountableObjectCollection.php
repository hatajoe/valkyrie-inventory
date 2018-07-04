<?php
/**
 * Created by PhpStorm.
 * User: hatajoe
 * Date: 2018/07/04
 * Time: 17:57
 */

namespace Valkyrie\Inventory;


class CountableObjectCollection implements \IteratorAggregate
{
    /**
     * @var CountableObject[]
     */
    private $items;

    public function __construct(CountableObject ...$items)
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
     * @param int $type
     * @return null|CountableObject
     */
    public function search(int $type): ?CountableObject
    {
        foreach ($this->items as $item) {
            if ($item->getType() == $type) {
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
     * @param CountableObject $item
     */
    public function append(CountableObject $item)
    {
        $this->items[] = $item;
    }

    /**
     * @return CountableObject[]
     */
    public function toArray(): array
    {
        return $this->items;
    }
}