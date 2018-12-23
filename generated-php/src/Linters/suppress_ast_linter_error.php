<?php
namespace Facebook\HHAST\Linters\SuppressASTLinter;

use Facebook\HHAST\{BreakStatement as BreakStatement, ContinueStatement as ContinueStatement, EchoStatement as EchoStatement, EditableNode as EditableNode, EditableToken as EditableToken, GotoStatement as GotoStatement, IControlFlowStatement as IControlFlowStatement, ReturnStatement as ReturnStatement, ThrowStatement as ThrowStatement, TryStatement as TryStatement, UnsetStatement as UnsetStatement};
use Facebook\HHAST\Linters\{BaseLinter as BaseLinter, LintError as LintError};
use HH\Lib\{C as C, Str as Str, Vec as Vec};
/**
 * Allow users to suppress specific cases where a linter is used.
 **/
/**
 * @param array<int, EditableNode> $parents
 *
 * @return bool
 */
function is_linter_error_suppressed(BaseLinter $linter, EditableNode $node, array $parents, LintError $_error)
{
    $token = $node->getFirstToken();
    $fixme = $linter->getFixmeMarker();
    $ignore = $linter->getIgnoreSingleErrorMarker();
    return is_linter_suppressed_in_current_node($token, $fixme, $ignore) || is_linter_suppressed_in_sibling_node($parents, $fixme, $ignore) || is_linter_suppressed_up_to_statement($parents, $fixme, $ignore);
}
// Check the current token's leading trivia. For example a comment on the line before
/**
 * @return bool
 */
function is_linter_suppressed_in_current_node(?EditableToken $token, string $fixme, string $ignore)
{
    if ($token === null) {
        return false;
    }
    $leading = $token->getLeading()->getCode();
    return Str\contains($leading, $fixme) || Str\contains($leading, $ignore);
}
// Check sibling node as the comment might be attached there instead of on the current node
/**
 * @param array<int, EditableNode> $parents
 *
 * @return bool
 */
function is_linter_suppressed_in_sibling_node(array $parents, string $fixme, string $ignore)
{
    $parent = C\last($parents);
    if ($parent === null) {
        return false;
    }
    $sibling = C\first($parent->getChildren());
    if ($sibling === null) {
        return false;
    }
    $token = $sibling->getLastToken();
    if ($token !== null) {
        $trailing = $token->getTrailing()->getCode();
        if (Str\contains($trailing, $fixme) || Str\contains($trailing, $ignore)) {
            return true;
        }
        $leading = $token->getLeading()->getCode();
        if (Str\contains($leading, $fixme) || Str\contains($leading, $ignore)) {
            return true;
        }
    }
    return false;
}
// Walk up the parents and check the leading trivia until we hit a Statement type node.
/**
 * @param array<int, EditableNode> $parents
 *
 * @return bool
 */
function is_linter_suppressed_up_to_statement(array $parents, string $fixme, string $ignore)
{
    $parents = Vec\reverse($parents);
    foreach ($parents as $parent) {
        if ($parent instanceof IControlFlowStatement || $parent instanceof BreakStatement || $parent instanceof ContinueStatement || $parent instanceof EchoStatement || $parent instanceof GotoStatement || $parent instanceof ReturnStatement || $parent instanceof ThrowStatement || $parent instanceof TryStatement || $parent instanceof UnsetStatement) {
            return false;
        }
        $token = $parent->getFirstToken();
        if ($token !== null) {
            $leading = $token->getCode();
            if (Str\contains($leading, $fixme) || Str\contains($leading, $ignore)) {
                return true;
            }
        }
    }
    return false;
}

