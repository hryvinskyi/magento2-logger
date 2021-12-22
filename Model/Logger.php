<?php
/**
 * Copyright (c) 2020. Hryvinskyi. All rights reserved.
 * @author: Volodymyr Hryvinskyi <v.gryvinskyi@temabit.com>
 */

declare(strict_types=1);

namespace Hryvinskyi\Logger\Model;

/**
 * Without this class also logging to system.log and debug.log
 */
class Logger extends \Monolog\Logger
{

}
