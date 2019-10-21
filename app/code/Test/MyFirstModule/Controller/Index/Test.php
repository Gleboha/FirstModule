<?php
namespace Test\MyFirstModule\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\TestFramework\Event\Magento;

class Test extends \Magento\Framework\App\Action\Action
{
    protected $pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)

    {
        $this->pageFactory = $pageFactory;
        return parent::__construct($context);

    }

    public function execute()
    {
        echo 'Hello World';
        exit;
    }
}
