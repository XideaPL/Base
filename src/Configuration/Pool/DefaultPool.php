<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Base\Configuration;

use Xidea\Base\Configuration\PoolInterface;
use Xidea\Base\ConfigurationInterface;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class DefaultPool implements PoolInterface
{
    /**
     * @var array
     */
    protected $configurations = array();
    
    /**
     * @inheritDoc
     */
    public function addConfiguration(ConfigurationInterface $configuration)
    {
        $this->configurations[$configuration->getCode()] = $configuration;
    }
    
    /**
     * @inheritDoc
     */
    public function getConfiguration($code)
    {
        return isset($this->configurations[$code]) ? $this->configurations[$code] : null;
    }
    
    /**
     * @inheritDoc
     */
    public function getConfigurations()
    {
        return $this->configurations;
    }
}
