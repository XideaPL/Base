<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Base\Configuration;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
interface PoolInterface
{
    /**
     * @param \Xidea\Base\ConfigurationInterface $configuration
     */
    function addConfiguration(ConfigurationInterface $configuration);
    
    /**
     * 
     * @param string $code
     * 
     * @return \Xidea\Base\ConfigurationInterface
     */
    function getConfiguration($code);
    
    /**
     * return array
     */
    function getConfigurations();
}
