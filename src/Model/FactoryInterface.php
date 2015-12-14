<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Base\Model;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
interface FactoryInterface
{
    /**
     * @return object
     */
    public function create();
}
