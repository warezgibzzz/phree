<?php

namespace Gibz\Phree\Tree;

use Gibz\Phree\Node\NodeInterface;

/**
 * Interface TreeInterface
 * @package Gibz\Phree\Tree
 */
interface TreeInterface
{
    /**
     * TreeInterface constructor.
     */
    public function __construct();

    /**
     * @param mixed $path
     * @param mixed $value
     *
     * @return self
     */
    public function add($path, $value);

    /**
     * @param mixed $key
     *
     * @return NodeInterface|null
     */
    public function get($key);
}
