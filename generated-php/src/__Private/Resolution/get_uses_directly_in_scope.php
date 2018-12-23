<?php
namespace Facebook\HHAST\__Private\Resolution;

use Facebook\HHAST\{EditableNode as EditableNode, NamespaceGroupUseDeclaration as NamespaceGroupUseDeclaration, NamespaceToken as NamespaceToken, NamespaceUseClause as NamespaceUseClause, NamespaceUseDeclaration as NamespaceUseDeclaration, TypeToken as TypeToken};
use HH\Lib\{C as C, Str as Str};
/**
 * @return array{namespaces:array<string, string>, types:array<string, string>}
 */
function get_uses_directly_in_scope(EditableNode $scope)
{
    $uses = array();
    $statements = $scope->getChildrenOfType(NamespaceUseDeclaration::class);
    foreach ($statements as $statement) {
        $kind = $statement->getKind();
        $clauses = $statement->getClauses()->getDescendantsOfType(NamespaceUseClause::class);
        foreach ($clauses as $clause) {
            $uses[] = array($clause->hasClauseKind() ? $clause->getClauseKind() : $kind, Str\trim($clause->getNameUNTYPED()->getCode()), $clause->getAlias());
        }
    }
    $statements = $scope->getChildrenOfType(NamespaceGroupUseDeclaration::class);
    foreach ($statements as $statement) {
        $kind = $statement->getKind();
        $prefix = Str\strip_prefix(Str\trim($statement->getPrefix()->getCode()), '\\');
        $clauses = $statement->getClauses()->getDescendantsOfType(NamespaceUseClause::class);
        foreach ($clauses as $clause) {
            $uses[] = array($clause->hasClauseKind() ? $clause->getClauseKind() : $kind, $prefix . Str\trim($clause->getNameUNTYPED()->getCode()), $clause->getAlias());
        }
    }
    $namespaces = array();
    $types = array();
    foreach ($uses as $use) {
        list($kind, $name, $alias) = $use;
        $alias = Str\strip_prefix(Str\trim($alias === null ? C\lastx(\explode('\\', $name)) : $alias->getCode()), '\\');
        if ($kind === null) {
            $namespaces[$alias] = $name;
            $types[$alias] = $name;
        } else {
            if ($kind instanceof NamespaceToken) {
                $namespaces[$alias] = $name;
            } else {
                if ($kind instanceof TypeToken) {
                    $types[$alias] = $name;
                }
            }
        }
    }
    return array('namespaces' => $namespaces, 'types' => $types);
}

