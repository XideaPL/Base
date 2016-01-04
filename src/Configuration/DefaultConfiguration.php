<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Base\Configuration;

use Xidea\Base\ConfigurationInterface;
use Xidea\Base\Pagination\AbstractPaginator;
use Xidea\Base\Pagination\AbstractSorter;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class DefaultConfiguration implements ConfigurationInterface
{
    /**
     * @var string
     */
    protected $code;
    
    /**
     * @var string
     */
    protected $paginationParameterName = AbstractPaginator::PARAMETER_NAME;
    
    /*
     * @var int
     */
    protected $paginationLimit = 25;
    
    /*
     * @var array
     */
    protected $paginationLimitValues = [25, 50, 75, 100];
    
    /*
     * @var string
     */
    protected $sortParameterName = AbstractSorter::PARAMETER_NAME;

    /**
     * 
     * @param string $code
     */
    public function __construct($code)
    {
        $this->code = $code;
    }
    
    /**
     * @inheritDoc
     */
    public function getCode()
    {
        return $this->code;
    }
    
    /**
     * @inheritDoc
     */
    public function getPaginationParameterName()
    {
        return $this->paginationParameterName;
    }
    
    /**
     * @inheritDoc
     */
    public function getPaginationLimit()
    {
        return $this->paginationLimit;
    }
    
    /**
     * @inheritDoc
     */
    public function getPaginationLimitValues()
    {
        return $this->paginationLimitValues;
    }
    
    /**
     * @inheritDoc
     */
    public function getSortParameterName()
    {
        return $this->sortParameterName;
    }
}
