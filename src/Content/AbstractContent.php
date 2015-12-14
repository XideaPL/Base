<?php

/*
 * (c) Xidea Artur Pszczółka <biuro@xidea.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xidea\Base\Content;

/**
 */
abstract class AbstractContent implements ContentInterface, TitledInterface
{
    /*
     * @var int
     */
    protected $id;
    
    /*
     * @var string
     */
    protected $title;
    
    /*
     * @var string
     */
    protected $body;
    
    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @inheritDoc
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @inheritDoc
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * @inheritDoc
     */
    public function getBody()
    {
        return $this->body;
    }
    
    /**
     * @inheritDoc
     */
    public function setBody($body)
    {
        $this->body = $body;
    }
}
