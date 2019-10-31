<?php

namespace Test\Task2\Block;

use Magento\Framework\View\Element\Template\Context;
use Test\Task2\Model\PostFactory;
/**
 * Test View block
 */
class View extends \Magento\Framework\View\Element\Template
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
        $this->pageConfig->getTitle()->set(__('Detail Page'));

        return parent::_prepareLayout();
    }

    public function getSingleData()
    {
        $id = $this->getRequest()->getParam('id');
        $post = $this->_post->create();
        $singleData = $post->load($id);
        return $singleData;
    }
}