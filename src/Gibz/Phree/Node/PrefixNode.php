<?php
/**
 * Created by PhpStorm.
 * User: gibz
 * Date: 3/23/18
 * Time: 4:57 PM
 */

namespace Gibz\Phree\Node;


use Gibz\Phree\Tree\PrefixTree;

class PrefixNode implements NodeInterface
{
    private $key;

    private $value;

    private $children;


    /**
     * NodeInterface constructor.
     *
     * @param mixed        $key
     * @param mixed        $value
     * @param PrefixNode[] $children
     */
    public function __construct($key = null, $value = null, $children = [])
    {
        $this->key = $key;
        $this->value = $value;
        $this->children = $children;
    }

    /**
     * @param $key
     *
     * @return PrefixNode|null
     */
    function get($key)
    {
        foreach ($this->children as $child) {
            if ($child->key == $key) {
                return $child;
            }
        }

        return null;
    }

    /**
     * @return mixed|null
     */
    public function getKey()
    {
        return $this->key;
    }

    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return mixed|null
     */
    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return array|PrefixNode[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    public function addChildren(PrefixNode $prefixNode)
    {
        $this->children[] = $prefixNode;
    }

    public function hasChildren()
    {
        return (count($this->getChildren()) > 0);
    }

    /**
     * @param PrefixNode $node
     */
    public function removeChild($node)
    {
        $children = array_filter($this->getChildren(), function($child) use ($node) { /** @var PrefixNode $child */
            return $child->getKey() != $node->getKey();
        });

        $this->children = $children;
    }

    public function removeAllChildren() {
        $this->children = [];
    }
}