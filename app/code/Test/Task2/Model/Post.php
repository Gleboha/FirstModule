<?php
namespace Test\Task2\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'test_task2_post';

    protected $_cacheTag = 'test_task2_post';

    protected $_eventPrefix = 'test_task2_post';

    protected function _construct()
    {
        $this->_init('Test\Task2\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}