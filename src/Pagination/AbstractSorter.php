<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Base\Pagination;

use Xidea\Base\Pagination\RequestInterface;

/**
 * @author Artur Pszczółka <a.pszczolka@xidea.pl>
 */
class AbstractSorter implements SorterInterface
{
    const PARAMETER_NAME = 'sort';
    const DIRECTION_VALUE = 'asc';

    /*
     * @var RequestInterface
     */
    protected $request;

    /*
     * @var array 
     */
    protected $options = [
        'parameterName' => self::PARAMETER_NAME,
        'defaultDirectionValue' => self::DIRECTION_VALUE,
        'availableDirectionValues' => ['asc', 'desc'],
        'absoluteUrl' => false,
        'template' => 'base_sorting'
    ];

    /**
     * 
     * @param RequestInterface $request
     */
    public function __construct(RequestStack $request)
    {
        $this->request = $request;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->request;
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
    public function sort($target, array $options = [])
    {
        $request = $this->getRequest();

        if (!$request instanceof RequestInterface) {
            throw new \RuntimeException('Use the request object in the sorter.');
        }

        $options = array_merge($this->options, $options);

        $sorting = new Sorting($options);
        $sorting->setRoute($request->getRoute());

        $keys = $request->getKeys($options['parameterName']);

        if ($keys) {
            $defaultDirection = $options['defaultDirectionValue'];
            if (strpos($keys, '+') !== false) {
                $keys = explode('+', $keys);
            }

            $resolveKey = function($key) use ($sorting, $defaultDirection) {
                $keyName = $key;
                $keyDirection = $defaultDirection;

                $parts = explode('.', $key);
                
                if (count($parts) > 1) {
                    $direction = array_pop($parts);
                    
                    if (in_array($direction, ['asc', 'desc'])) {
                        $keyName = implode('.', $parts);
                        $keyDirection = $direction;
                    }
                }
                
                $sorting->addKey($keyName, $keyDirection);
            };

            if (is_array($keys)) {
                foreach ($keys as $key) {
                    call_user_func($resolveKey, $key);
                }
            } else {
                call_user_func($resolveKey, $keys);
            }

            $strategy = $this->getStrategy($target);
            $strategy->sort($target, $sorting->getKeys(), $sorting->getDirections());
        }

        return $sorting;
    }

    /**
     * @return SorterStrategyInterface
     */
    protected function getStrategy($target)
    {
        $strategies = $this->getStrategies();

        foreach ($strategies as $strategy) {
            if ($strategy->support($target))
                return $strategy;
        }

        throw new \Exception;
    }

    /**
     * @return Sorter\StrategyInterface[]
     */
    protected function getStrategies()
    {
        return [
            new Sorter\Strategy\QueryBuilder()
        ];
    }

}
