<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Base\Pagination\Request;

use Xidea\Base\Pagination\RequestInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class SymfonyRequest implements RequestInterface
{
    /*
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * 
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * @inheritDoc
     */
    public function getRoute()
    {
        return $this->requestStack->getCurrentRequest()->get('_route');
    }

    /**
     * @inheritDoc
     */
    public function getKeys($parameterName)
    {
        return $this->requestStack->getCurrentRequest()->query->get($options['parameterName']);
    }
}
