<?php


namespace Test\Task2\Controller\Adminhtml\Post;

class Save extends \Magento\Backend\App\Action
{
    var $gridFactory;


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Test\Task2\Model\PostFactory $postFactory
    ) {
        parent::__construct($context);
        $this->postFactory = $postFactory;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('test_task2/post/addrow');
            return;
        }
        try {
            $rowData = $this->postFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setEntityId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('test_task2/post/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Test_Task2::save');
    }
}