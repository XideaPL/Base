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
interface TitledInterface
{
    /**
     * Gets the title.
     * 
     * @return string
     */
    function getTitle();
    
    /**
     * Sets the title.
     * 
     * @param string
     */
    function setTitle($title);
}
