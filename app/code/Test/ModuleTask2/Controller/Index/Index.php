<?php

namespace Test\ModuleTask2\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Checkout\Model\Cart;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\LocalizedException;

class Index extends Action
{
    protected $_resultPageFactory;
    private $productRepository;
    protected $cart;
    protected $product;
    protected $sku;
    protected $productId;
    protected $result;


    public function __construct( Context $context,
                                 PageFactory $resultPageFactory,
                                 ProductRepositoryInterface $productRepository,
                                 Cart $cart
                                )
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->productRepository = $productRepository;
        $this->cart = $cart;
        parent::__construct($context);
    }

    public function execute()
    {
        try{
            $result = 'Item successfully add to cart!';
            $this->sku = $this->getRequest()->getParam('sku');
            $this->product = $this->productRepository->get($this->sku);
            $this->productId = $this->product->getId();
            $params = array(
                'product' => $this->productId,
                'qty' => 1 //quantity of product
            );
            $this->cart->addProduct($this->product, $params);
            $this->cart->save();
            echo $result;

        }catch (NoSuchEntityException $e){
            $noEntity = 'No product with this SKU!';
            echo $noEntity, ' ', $e->getMessage();
        }catch (LocalizedException $e){
            echo 'Error: ', $e->getMessage();
        }

        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;
    }
}