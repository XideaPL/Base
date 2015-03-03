<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Component\Base\Doctrine\ORM;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
interface ObjectManagerInterface
{
    /**
     * @param bool $flushMode
     */
    function setFlushMode($flushMode = true);
    
    /**
     * @return bool
     */
    function flush();
    
    /**
     * @return bool
     */
    function clear();
}
