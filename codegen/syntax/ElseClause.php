<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9699fd92dfc4cc119a4ba5aa0ce70091>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class ElseClause extends EditableNode implements IControlFlowStatement {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_statement;

  public function __construct(EditableNode $keyword, EditableNode $statement) {
    parent::__construct('else_clause');
    $this->_keyword = $keyword;
    $this->_statement = $statement;
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
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['else_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $statement = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['else_statement'],
      $file,
      $offset,
      $source
    );
    $offset += $statement->getWidth();
    return new static($keyword, $statement);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'statement' => $this->_statement,
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
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $statement = $this->_statement->rewrite($rewriter, $parents);
    if ($keyword === $this->_keyword && $statement === $this->_statement) {
      return $this;
    }
    return new static($keyword, $statement);
  }

  public function getKeywordUNTYPED(): EditableNode {
    return $this->_keyword;
  }

  /**
   * @return static
   */
  public function withKeyword(EditableNode $value) {
    if ($value === $this->_keyword) {
      return $this;
    }
    return new static($value, $this->_statement);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return ElseToken
   */
  public function getKeyword(): ElseToken {
    \assert($this->_keyword instanceof ElseToken);
    return $this->_keyword;
  }

  /**
   * @return ElseToken
   */
  public function getKeywordx(): ElseToken {
    return $this->getKeyword();
  }

  public function getStatementUNTYPED(): EditableNode {
    return $this->_statement;
  }

  /**
   * @return static
   */
  public function withStatement(EditableNode $value) {
    if ($value === $this->_statement) {
      return $this;
    }
    return new static($this->_keyword, $value);
  }

  public function hasStatement(): bool {
    return !$this->_statement->isMissing();
  }

  /**
   * @return CompoundStatement | EchoStatement | ExpressionStatement |
   * IfStatement | ReturnStatement
   */
  public function getStatement(): EditableNode {
    \assert($this->_statement instanceof EditableNode);
    return $this->_statement;
  }

  /**
   * @return CompoundStatement | EchoStatement | ExpressionStatement |
   * IfStatement | ReturnStatement
   */
  public function getStatementx(): EditableNode {
    return $this->getStatement();
  }
}