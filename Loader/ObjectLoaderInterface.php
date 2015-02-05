<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Component\Base\Loader;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
interface ObjectLoaderInterface
{
    /**
     * Returns an object by id.
     * 
     * @param int $id
     * 
     * @return object
     */
    function load($id);
    
    /**
     * Returns all objects.
     * 
     * @return array
     */
    function loadAll();
    
    /**
     * Returns a set of objects matching the criteria.
     * 
     * @return array
     */
    function loadBy(array $criteria, array $orderBy = array(), $limit = null, $offset = null);
    
    /**
     * Returns object matching the criteria.
     * 
     * @return array
     */
    function loadOneBy(array $criteria, array $orderBy = array());
}
