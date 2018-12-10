<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<787808121e5e2a60ec6cb21a125f98af>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class IsExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_left_operand;
  /**
   * @var EditableNode
   */
  private $_operator;
  /**
   * @var EditableNode
   */
  private $_right_operand;

  public function __construct(
    EditableNode $left_operand,
    EditableNode $operator,
    EditableNode $right_operand
  ) {
    parent::__construct('is_expression');
    $this->_left_operand = $left_operand;
    $this->_operator = $operator;
    $this->_right_operand = $right_operand;
  }

  /**
   * @param array<string, mixed> $json
   * @return static
   */
  public static function fromJSON(
    array $json,
    string $file,
    int $offset,
    string $source
  ) {
    $left_operand = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['is_left_operand'],
      $file,
      $offset,
      $source
    );
    $offset += $left_operand->getWidth();
    $operator = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['is_operator'],
      $file,
      $offset,
      $source
    );
    $offset += $operator->getWidth();
    $right_operand = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['is_right_operand'],
      $file,
      $offset,
      $source
    );
    $offset += $right_operand->getWidth();
    return new static($left_operand, $operator, $right_operand);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'left_operand' => $this->_left_operand,
      'operator' => $this->_operator,
      'right_operand' => $this->_right_operand,
    ];
  }

  /**
   * @psalm-param (\Closure(EditableNode, ?array<int, EditableNode>): EditableNode) $rewriter
   * @param ?array<int, EditableNode> $parents
   * @return static
   */
  public function rewriteDescendants(
    \Closure $rewriter,
    ?array $parents = null
  ) {
    $parents = $parents === null ? [] : vec($parents);
    $parents[] = $this;
    $left_operand = $this->_left_operand->rewrite($rewriter, $parents);
    $operator = $this->_operator->rewrite($rewriter, $parents);
    $right_operand = $this->_right_operand->rewrite($rewriter, $parents);
    if (
      $left_operand === $this->_left_operand &&
      $operator === $this->_operator &&
      $right_operand === $this->_right_operand
    ) {
      return $this;
    }
    return new static($left_operand, $operator, $right_operand);
  }

  public function getLeftOperandUNTYPED(): EditableNode {
    return $this->_left_operand;
  }

  /**
   * @return static
   */
  public function withLeftOperand(EditableNode $value) {
    if ($value === $this->_left_operand) {
      return $this;
    }
    return new static($value, $this->_operator, $this->_right_operand);
  }

  public function hasLeftOperand(): bool {
    return !$this->_left_operand->isMissing();
  }

  /**
   * @return FunctionCallWithTypeArgumentsExpression | PipeVariableExpression
   * | PrefixUnaryExpression | VariableExpression
   */
  public function getLeftOperand(): EditableNode {
    \assert($this->_left_operand instanceof EditableNode);
    return $this->_left_operand;
  }

  /**
   * @return FunctionCallWithTypeArgumentsExpression | PipeVariableExpression
   * | PrefixUnaryExpression | VariableExpression
   */
  public function getLeftOperandx(): EditableNode {
    return $this->getLeftOperand();
  }

  public function getOperatorUNTYPED(): EditableNode {
    return $this->_operator;
  }

  /**
   * @return static
   */
  public function withOperator(EditableNode $value) {
    if ($value === $this->_operator) {
      return $this;
    }
    return new static($this->_left_operand, $value, $this->_right_operand);
  }

  public function hasOperator(): bool {
    return !$this->_operator->isMissing();
  }

  /**
   * @return IsToken
   */
  public function getOperator(): IsToken {
    \assert($this->_operator instanceof IsToken);
    return $this->_operator;
  }

  /**
   * @return IsToken
   */
  public function getOperatorx(): IsToken {
    return $this->getOperator();
  }

  public function getRightOperandUNTYPED(): EditableNode {
    return $this->_right_operand;
  }

  /**
   * @return static
   */
  public function withRightOperand(EditableNode $value) {
    if ($value === $this->_right_operand) {
      return $this;
    }
    return new static($this->_left_operand, $this->_operator, $value);
  }

  public function hasRightOperand(): bool {
    return !$this->_right_operand->isMissing();
  }

  /**
   * @return ClosureTypeSpecifier | DictionaryTypeSpecifier |
   * GenericTypeSpecifier | KeysetTypeSpecifier | NullableTypeSpecifier |
   * ShapeTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
   * TupleTypeSpecifier | TypeConstant | VectorTypeSpecifier
   */
  public function getRightOperand(): EditableNode {
    \assert($this->_right_operand instanceof EditableNode);
    return $this->_right_operand;
  }

  /**
   * @return ClosureTypeSpecifier | DictionaryTypeSpecifier |
   * GenericTypeSpecifier | KeysetTypeSpecifier | NullableTypeSpecifier |
   * ShapeTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
   * TupleTypeSpecifier | TypeConstant | VectorTypeSpecifier
   */
  public function getRightOperandx(): EditableNode {
    return $this->getRightOperand();
  }
}