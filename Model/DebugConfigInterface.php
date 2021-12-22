<?php
/**
 * Copyright (c) 2021. All rights reserved.
 * @author: Volodymyr Hryvinskyi <mailto:volodymyr@hryvinskyi.com>
 */

declare(strict_types=1);

namespace Hryvinskyi\Logger\Model;

interface DebugConfigInterface
{
    /**
     * Is enabled debugging
     *
     * @return bool
     */
    public function isDebug(): bool;
}
