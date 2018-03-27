<?php

namespace Gibz\Phree\Node;

/**
 * Interface NodeInterface
 * @package Gibz\Phree\Node
 */
interface NodeInterface
{
    /**
     * NodeInterface constructor.
     *
     * @param mixed           $key
     * @param mixed           $value
     * @param NodeInterface[] $children
     */
    public function __construct($key, $value, $children);

    /**
     * @param mixed $key
     *
     * @return NodeInterface|null
     */
    public function get($key);
}
