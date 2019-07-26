<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST;

interface IHasFunctionBody
{
    // We can't refine the type further as lambdas can have expressions as
    // bodies, and making IExpression implement an IFunctionBody would make the
    // interface pretty meaningless.
    /**
     * @return bool
     */
    public function hasBody();
    /**
     * @return null|Node
     */
    public function getBody();
    /**
     * @return Node
     */
    public function getBodyx();
    /**
     * @return null|Node
     */
    public function getBodyUNTYPED();
}

