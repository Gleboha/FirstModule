<?php

namespace Test\Task2\Block;

use Magento\Framework\View\Element\Template\Context;
use Test\Task2\Model\PostFactory;
/**
 * Test List block
 */
class News extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        Context $context,
        PostFactory $post
    ) {
        $this->_post = $post;
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('News List'));

        return parent::_prepareLayout();
    }

    public function getNewsCollection()
    {
        $post = $this->_post->create();
        $collection = $post->getCollection();
        return $collection;
    }
}