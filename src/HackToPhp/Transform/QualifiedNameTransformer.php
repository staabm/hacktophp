<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;
use Psalm;

class QualifiedNameTransformer
{
	public static function transform(HHAST\QualifiedName $node) : PhpParser\Node\Name
	{
		$name = self::getText($node);

		return $name[0] === '\\'
			? new PhpParser\Node\Name\FullyQualified(substr($name, 1))
			: new PhpParser\Node\Name($name);
	}

	public static function getText(HHAST\QualifiedName $node, ?HackFile $file = null) : string
	{
		$name = implode(
			'\\',
			array_map(
				function(HHAST\ListItem $list_item) {
					$item = $list_item->getItem();
					
					if (!$item) {
						return '';
					}

					return $item->getText();
				},
				$node->getParts()->getChildren()
			)
		);

		if ($file && $name[0] !== '\\') {
			if (strpos($name, '\\')) {
				$name_parts = explode('\\', $name);
				$first_name_part = array_shift($name_parts);

				if (isset($file->aliased_namespaces[$first_name_part])) {
					return '\\' . $file->aliased_namespaces[$first_name_part] . '\\' . implode('\\', $name_parts);
				}
			} elseif (isset($file->aliased_types[$name])) {
				return '\\' . $file->aliased_types[$name];
			}

			if ($file->namespace) {
				return '\\' . $file->namespace . '\\' . $name;
			}

			return '\\' . $name;
		}

		return $name;
	}
}