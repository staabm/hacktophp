<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\Migrations;

use Facebook\HHAST\EditableNode as EditableNode;
interface IMigrationStep
{
    /**
     * @return string
     */
    public function getName();
    /**
     * @return EditableNode
     */
    public function rewrite(EditableNode $in);
}
