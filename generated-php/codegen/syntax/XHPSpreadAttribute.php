<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<84dee9c17e33fa01c780f5135be6dce1>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class XHPSpreadAttribute extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'xhp_spread_attribute';
    /**
     * @var LeftBraceToken
     */
    private $_left_brace;
    /**
     * @var DotDotDotToken
     */
    private $_spread_operator;
    /**
     * @var IExpression
     */
    private $_expression;
    /**
     * @var RightBraceToken
     */
    private $_right_brace;
    public function __construct(LeftBraceToken $left_brace, DotDotDotToken $spread_operator, IExpression $expression, RightBraceToken $right_brace, ?array $source_ref = null)
    {
        $this->_left_brace = $left_brace;
        $this->_spread_operator = $spread_operator;
        $this->_expression = $expression;
        $this->_right_brace = $right_brace;
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
        $left_brace = Node::fromJSON($json['xhp_spread_attribute_left_brace'], $file, $offset, $source, 'LeftBraceToken');
        $left_brace = $left_brace !== null ? $left_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_brace->getWidth();
        $spread_operator = Node::fromJSON($json['xhp_spread_attribute_spread_operator'], $file, $offset, $source, 'DotDotDotToken');
        $spread_operator = $spread_operator !== null ? $spread_operator : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $spread_operator->getWidth();
        $expression = Node::fromJSON($json['xhp_spread_attribute_expression'], $file, $offset, $source, 'IExpression');
        $expression = $expression !== null ? $expression : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $expression->getWidth();
        $right_brace = Node::fromJSON($json['xhp_spread_attribute_right_brace'], $file, $offset, $source, 'RightBraceToken');
        $right_brace = $right_brace !== null ? $right_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_brace->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_brace, $spread_operator, $expression, $right_brace, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_brace' => $this->_left_brace, 'spread_operator' => $this->_spread_operator, 'expression' => $this->_expression, 'right_brace' => $this->_right_brace]);
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
        $left_brace = $rewriter($this->_left_brace, $parents);
        $spread_operator = $rewriter($this->_spread_operator, $parents);
        $expression = $rewriter($this->_expression, $parents);
        $right_brace = $rewriter($this->_right_brace, $parents);
        if ($left_brace === $this->_left_brace && $spread_operator === $this->_spread_operator && $expression === $this->_expression && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($left_brace, $spread_operator, $expression, $right_brace);
    }
    /**
     * @return null|Node
     */
    public function getLeftBraceUNTYPED()
    {
        return $this->_left_brace;
    }
    /**
     * @return static
     */
    public function withLeftBrace(LeftBraceToken $value)
    {
        if ($value === $this->_left_brace) {
            return $this;
        }
        return new static($value, $this->_spread_operator, $this->_expression, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasLeftBrace()
    {
        return $this->_left_brace !== null;
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBrace()
    {
        return TypeAssert\instance_of(LeftBraceToken::class, $this->_left_brace);
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBracex()
    {
        return $this->getLeftBrace();
    }
    /**
     * @return null|Node
     */
    public function getSpreadOperatorUNTYPED()
    {
        return $this->_spread_operator;
    }
    /**
     * @return static
     */
    public function withSpreadOperator(DotDotDotToken $value)
    {
        if ($value === $this->_spread_operator) {
            return $this;
        }
        return new static($this->_left_brace, $value, $this->_expression, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasSpreadOperator()
    {
        return $this->_spread_operator !== null;
    }
    /**
     * @return DotDotDotToken
     */
    /**
     * @return DotDotDotToken
     */
    public function getSpreadOperator()
    {
        return TypeAssert\instance_of(DotDotDotToken::class, $this->_spread_operator);
    }
    /**
     * @return DotDotDotToken
     */
    /**
     * @return DotDotDotToken
     */
    public function getSpreadOperatorx()
    {
        return $this->getSpreadOperator();
    }
    /**
     * @return null|Node
     */
    public function getExpressionUNTYPED()
    {
        return $this->_expression;
    }
    /**
     * @return static
     */
    public function withExpression(IExpression $value)
    {
        if ($value === $this->_expression) {
            return $this;
        }
        return new static($this->_left_brace, $this->_spread_operator, $value, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return $this->_expression !== null;
    }
    /**
     * @return VariableExpression | XHPExpression
     */
    /**
     * @return IExpression
     */
    public function getExpression()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_expression);
    }
    /**
     * @return VariableExpression | XHPExpression
     */
    /**
     * @return IExpression
     */
    public function getExpressionx()
    {
        return $this->getExpression();
    }
    /**
     * @return null|Node
     */
    public function getRightBraceUNTYPED()
    {
        return $this->_right_brace;
    }
    /**
     * @return static
     */
    public function withRightBrace(RightBraceToken $value)
    {
        if ($value === $this->_right_brace) {
            return $this;
        }
        return new static($this->_left_brace, $this->_spread_operator, $this->_expression, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBrace()
    {
        return $this->_right_brace !== null;
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBrace()
    {
        return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBracex()
    {
        return $this->getRightBrace();
    }
}

