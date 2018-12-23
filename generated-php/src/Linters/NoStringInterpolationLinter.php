<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\Linters;

use Facebook\HHAST\{DollarToken as DollarToken, DotToken as DotToken, DoubleQuotedStringLiteralToken as DoubleQuotedStringLiteralToken, DoubleQuotedStringLiteralHeadToken as DoubleQuotedStringLiteralHeadToken, DoubleQuotedStringLiteralTailToken as DoubleQuotedStringLiteralTailToken, EditableList as EditableList, EditableNode as EditableNode, EmbeddedBracedExpression as EmbeddedBracedExpression, HeredocStringLiteralHeadToken as HeredocStringLiteralHeadToken, LiteralExpression as LiteralExpression, NameToken as NameToken, StringLiteralBodyToken as StringLiteralBodyToken, VariableToken as VariableToken};
use function Facebook\HHAST\Missing as Missing;
use HH\Lib\{C as C, Vec as Vec};
final class NoStringInterpolationLinter extends AutoFixingASTLinter
{
    /**
     * @return LiteralExpression::class
     */
    protected static function getTargetType()
    {
        return LiteralExpression::class;
    }
    /**
     * @param array<int, EditableNode> $_parents
     *
     * @return ASTLintError<LiteralExpression>|null
     */
    public function getLintErrorForNode(LiteralExpression $root_expr, array $_parents)
    {
        $expr = $root_expr->getExpression();
        if (!$expr instanceof EditableList) {
            return null;
        }
        return new ASTLintError($this, 'Do not use string interpolation - consider concatenation or ' . 'Str\\format() instead ', $root_expr);
        return null;
    }
    /**
     * @return string
     */
    protected function getTitleForFix(LintError $_)
    {
        return 'Replace interpolation with concatenation';
    }
    /**
     * @return null|EditableNode
     */
    public function getFixedNode(LiteralExpression $root_expr)
    {
        $expr = $root_expr->getExpression();
        invariant($expr instanceof EditableList, 'Expected list, got %s', \get_class($expr));
        $leading = null;
        $trailing = null;
        $children = (array) $expr->getChildren();
        $child_count = \count($children);
        $new_children = array();
        for ($i = 0; $i < $child_count; ++$i) {
            $child = $children[$i];
            if ($child instanceof HeredocStringLiteralHeadToken) {
                return null;
            }
            if ($child instanceof DoubleQuotedStringLiteralHeadToken) {
                if ($child->getText() === '"') {
                    $leading = $child->getLeading();
                    continue;
                }
                $new_children[] = new DoubleQuotedStringLiteralToken($child->getLeading(), $child->getTrailing(), $child->getText() . '"');
                continue;
            }
            if ($child instanceof DoubleQuotedStringLiteralTailToken) {
                if ($child->getText() === '"') {
                    $trailing = $child->getTrailing();
                    break;
                }
                $new_children[] = new DoubleQuotedStringLiteralToken($child->getLeading(), $child->getTrailing(), '"' . $child->getText());
                continue;
            }
            if ($child instanceof StringLiteralBodyToken) {
                $new_children[] = new DoubleQuotedStringLiteralToken(Missing(), Missing(), '"' . $child->getText() . '"');
                continue;
            }
            if ($child instanceof DollarToken) {
                invariant($i + 1 < $child_count, 'Shouldn\'t have a dollar token unless there\'s more tokens after it');
                $next = $children[$i + 1];
                ++$i;
                invariant($next instanceof EmbeddedBracedExpression, 'Dollar token in string should be followed by embedded brace ' . 'expression.');
                $inner = $next->getExpression();
                invariant($inner instanceof NameToken, '"${}" should contain a variable name');
                $new_children[] = new VariableToken(Missing(), Missing(), '$' . $inner->getText());
                continue;
            }
            if ($child instanceof EmbeddedBracedExpression) {
                $new_children[] = $child->getExpression();
                continue;
            }
            $new_children[] = $child;
        }
        $children = $new_children;
        for ($i = 0; $i < \count($children) - 1; ++$i) {
            $children = Vec\concat(Vec\slice($children, 0, $i + 1), array(new DotToken(Missing(), Missing())), Vec\slice($children, $i + 1));
            ++$i;
        }
        return EditableList::createNonEmptyListOrMissing($children);
    }
}
