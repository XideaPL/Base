<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Base\Pagination\Paginator\Strategy;

use Xidea\Base\Pagination\Paginator\StrategyInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\ORM\QueryBuilder as DoctrineORMQueryBuilder;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class QueryBuilder implements StrategyInterface
{
    /*
     * @var int
     */
    protected $total = 0;

    /**
     * @inheritDoc
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @inheritDoc
     */
    public function paginate($target, $offset, $limit)
    {
        $target
            ->setFirstResult($offset)
            ->setMaxResults($limit)
        ;
        $paginator = new Paginator($target);
        
        $this->total = $paginator->count();

        return $paginator->getIterator();
    }

    /**
     * @inheritDoc
     */
    public function support($target)
    {
        return $target instanceof DoctrineORMQueryBuilder;
    }

}
