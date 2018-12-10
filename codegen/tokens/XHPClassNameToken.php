<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<75e9d34efa418a57e3b61d93eaa123b7>>
 */
namespace HackToPhp\HHAST;


final class XHPClassNameToken extends EditableTokenWithVariableText {

  const KIND = 'XHP_class_name';

  public function __construct(
    EditableNode $leading,
    EditableNode $trailing,
    string $text
  ) {
    parent::__construct($leading, $trailing, $text);
  }

  public function hasLeading(): bool {
    return !$this->getLeading()->isMissing();
  }

  /**
   * @return static
   */
  public function withLeading(EditableNode $value) {
    if ($value === $this->getLeading()) {
      return $this;
    }
    return new self($value, $this->getTrailing(), $this->getText());
  }

  public function hasTrailing(): bool {
    return !$this->getTrailing()->isMissing();
  }

  /**
   * @return static
   */
  public function withTrailing(EditableNode $value) {
    if ($value === $this->getTrailing()) {
      return $this;
    }
    return new self($this->getLeading(), $value, $this->getText());
  }

  /**
   * @return static
   */
  public function withText(string $value) {
    if ($value === $this->getText()) {
      return $this;
    }
    return new self($this->getLeading(), $this->getTrailing(), $value);
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
    $leading = $this->getLeading()->rewrite($rewriter, $parents);
    $trailing = $this->getTrailing()->rewrite($rewriter, $parents);
    $text = $this->getText();
    if (
      $leading === $this->getLeading() &&
      $trailing === $this->getTrailing() &&
      $text === $this->getText()
    ) {
      return $this;
    }
    return new self($leading, $trailing, $text);
  }
}