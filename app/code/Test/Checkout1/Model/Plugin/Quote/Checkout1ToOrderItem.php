<?php
namespace Test\Checkout1\Model\Plugin\Quote;

class Checkout1ToOrderItem{

    public function aroundConvert(
        \Magento\Quote\Model\Quote\Item\ToOrderItem $subject,
        \Closure $proceed,
        \Magento\Quote\Model\Quote\Item\AbstractItem $item,
        $additional = []
    ) {
        /** @var $orderItem Item */
        $field = 'additional_field';
        $orderItem = $proceed($item, $additional);
        $orderItem->setAdditionalFieldData($field, $item->getAdditionalFieldData());
        return $orderItem;
    }
}

