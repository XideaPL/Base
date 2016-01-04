<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Base\Pagination;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
interface RequestInterface
{
    /*
     * @return string
     */
    function getRoute();
    
    /*
     * @return array
     */
    function getKeys($parameterName);
}
