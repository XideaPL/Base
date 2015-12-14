<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Base\Util\String;

/**
 * A helper class which creates random string.
 * 
 * @author Artur Pszczółka <artur.pszczolka@xidea.pl>
 */
class RandomGenerator
{

    /**
     * @param string $length
     * @return string
     */
    public static function generate($length = 8, array $options = array())
    {
        $defaults = array(
            'chars' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
        );
        $options = array_merge($defaults, $options);
        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $result .= $options['chars'][rand(0, strlen($options['chars']) - 1)];
        }
        
        return $result;
    }
    
    /**
     * @param string $length
     * @return string
     */
    public static function generateChain($length = 32, $strLength = 8, $options = array())
    {
        $result = array();
        for($i = 0; $i < $length; $i++)
            $result[] = self::generate($strLength, $options);
        
        return implode(' ', $result);
    }

}