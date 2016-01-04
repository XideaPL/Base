<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Base\Pagination;

use Xidea\Base\Pagination\RequestInterface;
use Xidea\Base\Pagination\SorterInterface;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class AbstractPaginator implements PaginatorInterface
{
    const PARAMETER_NAME = 'page';
    
    /*
     * @var RequestInterface
     */
    protected $request;
    
    /*
     * @var SorterInterface
     */
    protected $sorter;
    
    /*
     * @var array 
     */
    protected $options = [
        'parameterName' => self::PARAMETER_NAME,
        'absoluteUrl' => false,
        'template' => 'base_pagination_bootstrap_v3'
    ];
    
    /**
     * @param RequestInterface $request
     * @param SorterInterface $sorter
     */
    public function __construct(RequestInterface $request, SorterInterface $sorter)
    {
        $this->request = $request;
        $this->sorter = $sorter;
    }
    
    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }
    
    /**
     * @return SorterInterface
     */
    public function getSorter()
    {
        return $this->sorter;
    }
    
    /**
     * @inheritDoc
     */
    public function setOptions(array $options)
    {
        $this->options = array_merge($this->options, $options);
    }
    
    /**
     * @inheritDoc
     */
    public function getOptions()
    {
        return $this->options;
    }
    
    /**
     * @inheritDoc
     */
    public function paginate($target, $page = 1, $limit = 10, array $options = [])
    {
        $strategy = $this->getStrategy($target);

        $limit = intval(abs($limit));
        $offset = abs($page - 1) * $limit;
        
        $options = array_merge($this->options, $options);
        
        $request = $this->getRequest();
        $sorter = $this->getSorter();
        $pagination = new Pagination($options);
        $pagination->setRoute($request->getRoute());
        
        $sorting = $sorter->sort($target, isset($options['sorter']) ? $options['sorter'] : []);
        
        $items = $strategy->paginate($target, $offset, $limit);
        
        $pagination->setSorting($sorting);
        $pagination->setCurrentPage($page);
        $pagination->setLimit($limit);
        $pagination->setItems($items);
        $pagination->setTotal($strategy->getTotal());
        
        return $pagination;
    }
    
    /**
     * @return PaginatorStrategyInterface
     */
    protected function getStrategy($target)
    {
        $strategies = $this->getStrategies();
        
        foreach($strategies as $strategy) {
            if($strategy->support($target))
                return $strategy;
        }
        
        throw new \Exception;
    }
    
    /**
     * @return Paginator\StrategyInterface[]
     */
    protected function getStrategies()
    {
        return [
            new Paginator\Strategy\QueryBuilder()
        ];
    }
}