<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Base\Content;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
interface ContentInterface
{

    /**
     * Returns a id.
     * 
     * @return mixed The id
     */
    function getId();
    
    /**
     * Gets the body.
     * 
     * @return string
     */
    function getBody();
    
    /**
     * Sets the body.
     * 
     * @param string
     */
    function setBody($body);
}
