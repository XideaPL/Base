<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Base\Pagination\Sorter\Strategy;

use Xidea\Base\Pagination\Sorter\StrategyInterface;
use Doctrine\ORM\QueryBuilder as DoctrineORMQueryBuilder;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class QueryBuilder implements StrategyInterface
{
    /**
     * @inheritDoc
     */
    public function sort($target, $keys, $directions)
    {
        foreach($keys as $key) {
            $target->addOrderBy($key, $directions[$key]);
        }
    }

    /**
     * @inheritDoc
     */
    public function support($target)
    {
        return $target instanceof DoctrineORMQueryBuilder;
    }

}
