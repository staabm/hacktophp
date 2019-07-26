<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5a3a9065c4798b002c6c1ef28b80c4c6>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class PropertyDeclarator extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'property_declarator';
    /**
     * @var VariableToken
     */
    private $_name;
    /**
     * @var null|SimpleInitializer
     */
    private $_initializer;
    public function __construct(VariableToken $name, ?SimpleInitializer $initializer, ?__Private\SourceRef $source_ref = null)
    {
        $this->_name = $name;
        $this->_initializer = $initializer;
        parent::__construct($source_ref);
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $initial_offset, string $source, string $_type_hint)
    {
        $offset = $initial_offset;
        $name = Node::fromJSON($json['property_name'], $file, $offset, $source, 'VariableToken');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $initializer = Node::fromJSON($json['property_initializer'], $file, $offset, $source, 'SimpleInitializer');
        $offset += (($__tmp1__ = $initializer) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($name, $initializer, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['name' => $this->_name, 'initializer' => $this->_initializer]);
    }
    /**
     * @template Tret as null|Node
     *
     * @param \Closure(Node, array<int, Node>):Tret $rewriter
     * @param array<int, Node> $parents
     *
     * @return static
     */
    public function rewriteChildren(\Closure $rewriter, array $parents = [])
    {
        $parents[] = $this;
        $name = $rewriter($this->_name, $parents);
        $initializer = $this->_initializer === null ? null : $rewriter($this->_initializer, $parents);
        if ($name === $this->_name && $initializer === $this->_initializer) {
            return $this;
        }
        return new static($name, $initializer);
    }
    /**
     * @return null|Node
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(VariableToken $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($value, $this->_initializer);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->_name !== null;
    }
    /**
     * @return VariableToken
     */
    /**
     * @return VariableToken
     */
    public function getName()
    {
        return TypeAssert\instance_of(VariableToken::class, $this->_name);
    }
    /**
     * @return VariableToken
     */
    /**
     * @return VariableToken
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return null|Node
     */
    public function getInitializerUNTYPED()
    {
        return $this->_initializer;
    }
    /**
     * @return static
     */
    public function withInitializer(?SimpleInitializer $value)
    {
        if ($value === $this->_initializer) {
            return $this;
        }
        return new static($this->_name, $value);
    }
    /**
     * @return bool
     */
    public function hasInitializer()
    {
        return $this->_initializer !== null;
    }
    /**
     * @return null | SimpleInitializer
     */
    /**
     * @return null|SimpleInitializer
     */
    public function getInitializer()
    {
        return $this->_initializer;
    }
    /**
     * @return SimpleInitializer
     */
    /**
     * @return SimpleInitializer
     */
    public function getInitializerx()
    {
        return TypeAssert\not_null($this->getInitializer());
    }
}

