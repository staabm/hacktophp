<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f5c5be209252300ac03c604491d6cd3d>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class SafeMemberSelectionExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_object;
  /**
   * @var EditableNode
   */
  private $_operator;
  /**
   * @var EditableNode
   */
  private $_name;

  public function __construct(
    EditableNode $object,
    EditableNode $operator,
    EditableNode $name
  ) {
    parent::__construct('safe_member_selection_expression');
    $this->_object = $object;
    $this->_operator = $operator;
    $this->_name = $name;
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
    $object = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['safe_member_object'],
      $file,
      $offset,
      $source
    );
    $offset += $object->getWidth();
    $operator = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['safe_member_operator'],
      $file,
      $offset,
      $source
    );
    $offset += $operator->getWidth();
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['safe_member_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    return new static($object, $operator, $name);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'object' => $this->_object,
      'operator' => $this->_operator,
      'name' => $this->_name,
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
    $object = $this->_object->rewrite($rewriter, $parents);
    $operator = $this->_operator->rewrite($rewriter, $parents);
    $name = $this->_name->rewrite($rewriter, $parents);
    if (
      $object === $this->_object &&
      $operator === $this->_operator &&
      $name === $this->_name
    ) {
      return $this;
    }
    return new static($object, $operator, $name);
  }

  public function getObjectUNTYPED(): EditableNode {
    return $this->_object;
  }

  /**
   * @return static
   */
  public function withObject(EditableNode $value) {
    if ($value === $this->_object) {
      return $this;
    }
    return new static($value, $this->_operator, $this->_name);
  }

  public function hasObject(): bool {
    return !$this->_object->isMissing();
  }

  /**
   * @return FunctionCallExpression | MemberSelectionExpression |
   * PrefixUnaryExpression | SafeMemberSelectionExpression |
   * ScopeResolutionExpression | VariableExpression
   */
  public function getObject(): EditableNode {
    \assert($this->_object instanceof EditableNode);
    return $this->_object;
  }

  /**
   * @return FunctionCallExpression | MemberSelectionExpression |
   * PrefixUnaryExpression | SafeMemberSelectionExpression |
   * ScopeResolutionExpression | VariableExpression
   */
  public function getObjectx(): EditableNode {
    return $this->getObject();
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
    return new static($this->_object, $value, $this->_name);
  }

  public function hasOperator(): bool {
    return !$this->_operator->isMissing();
  }

  /**
   * @return QuestionMinusGreaterThanToken
   */
  public function getOperator(): QuestionMinusGreaterThanToken {
    \assert($this->_operator instanceof QuestionMinusGreaterThanToken);
    return $this->_operator;
  }

  /**
   * @return QuestionMinusGreaterThanToken
   */
  public function getOperatorx(): QuestionMinusGreaterThanToken {
    return $this->getOperator();
  }

  public function getNameUNTYPED(): EditableNode {
    return $this->_name;
  }

  /**
   * @return static
   */
  public function withName(EditableNode $value) {
    if ($value === $this->_name) {
      return $this;
    }
    return new static($this->_object, $this->_operator, $value);
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @return PrefixUnaryExpression | XHPClassNameToken | NameToken
   */
  public function getName(): EditableNode {
    \assert($this->_name instanceof EditableNode);
    return $this->_name;
  }

  /**
   * @return PrefixUnaryExpression | XHPClassNameToken | NameToken
   */
  public function getNamex(): EditableNode {
    return $this->getName();
  }
}