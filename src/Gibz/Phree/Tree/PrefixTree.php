<?php
namespace Gibz\Phree\Tree;


use Gibz\Phree\Node\PrefixNode;

class PrefixTree implements TreeInterface
{
    /**
     * @var PrefixNode
     */
    private $root;

    /**
     * TreeInterface constructor.
     */
    public function __construct()
    {
        $this->root = new PrefixNode();
    }

    /**
     * @param mixed $path
     * @param mixed $value
     */
    public function add($path, $value)
    {
        $current = $this->root;
        foreach ($path as $k) {
            $found = false;
            foreach ($current->getChildren() as $child) {
                if ($child->getKey() == $k) {
                    $current = $child;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $n = new PrefixNode($k);
                $current->addChildren($n);
                $current = $n;
            }
        }
        $current->setValue($value);
    }

    /**
     * @param mixed $key
     *
     * @return PrefixNode|null
     */
    public function get($key)
    {
        return $this->root->get($key);
    }
}