<?php
namespace Test\Task2\Model\ResourceModel\Post;

class CollectionFactory
{
    /**
     * Object Manager instance
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager = null;

    /**
     * Instance name to create
     *
     * @var string
     */
    protected $_instanceName = null;

    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager, $instanceName = '\\Test\\Task2\\Model\\ResourceModel\\Post\\Collection')
    {
        $this->_objectManager = $objectManager;
        $this->_instanceName = $instanceName;
    }

    public function create(array $data = array())
    {
        return $this->_objectManager->create($this->_instanceName, $data);
    }
}