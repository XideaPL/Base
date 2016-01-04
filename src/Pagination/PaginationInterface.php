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
interface PaginationInterface
{
    /*
     * @return mixed
     */
    function getPaginatorOption($name);
    
    /*
     * @var array
     */
    function getPaginatorOptions();
    
    /**
     * @param SortingInterface $sorting
     */
    function setSorting(SortingInterface $sorting = null);
    
    /**
     * @return SortingInterface
     */
    function getSorting();
    
    /**
     * @param string $route
     */
    function setRoute($route);
    
    /**
     * @return string
     */
    function getRoute();
    
    /**
     * @param array $parameters
     */
    function setRouteParameters(array $parameters);
    
    /**
     * @return array
     */
    function getRouteParameters();
    
    /**
     * @param string $name
     * @param mixed $value
     */
    function addRouteParameter($name, $value);
    
    /**
     * @param int $page
     */
    function setCurrentPage($page);
    
    /**
     * @return int
     */
    function getCurrentPage();
    
    /**
     * @param int $limit
     */
    function setLimit($limit);
    
    /**
     * @return int
     */
    function getLimit();
    
    /**
     * @param int $total
     */
    function setTotal($total);
    
    /**
     * @return int
     */
    function getTotal();
    
    /**
     * @param mixed $items
     */
    function setItems($items);
    
    /**
     * @return array
     */
    function getItems();
    
    /**
     * @return int
     */
    function getPageCount();
    
    /**
     * @return array
     */
    function getViewData();
}
