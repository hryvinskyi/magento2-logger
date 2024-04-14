<?php
/**
 * Copyright (c) 2021. All rights reserved.
 * @author: Volodymyr Hryvinskyi <mailto:volodymyr@hryvinskyi.com>
 */

declare(strict_types=1);

namespace Hryvinskyi\Logger\Model;

use Magento\Framework\Filesystem\DriverInterface;
use Magento\Framework\Logger\Handler\Base;

/**
 * Class Debug
 */
class Handler extends Base
{
    /**
     * @var DebugConfigInterface
     */
    private $config;

    /**
     * Debug constructor.
     *
     * @param DriverInterface $filesystem
     * @param DebugConfigInterface $config
     * @param string|null $filePath
     * @param string $fileName
     *
     * @throws \Exception
     */
    public function __construct(
        DriverInterface $filesystem,
        DebugConfigInterface $config,
        $filePath = null,
        $fileName = '/var/log/other/others.log'
    ) {
        $this->config = $config;

        parent::__construct($filesystem, $filePath, $fileName);
    }

    /**
     * @inheritDoc
     *
     * @throws \Magento\Framework\Exception\FileSystemException
     */
    protected function write(array $record): void
    {
        if ($this->config->isDebug() === false) {
            return;
        }

        $logDir = $this->filesystem->getParentDirectory($this->url);
        if (!$this->filesystem->isDirectory($logDir)) {
            $this->filesystem->createDirectory($logDir);
        }

        parent::write($record);
    }
}
