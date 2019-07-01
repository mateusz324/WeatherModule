<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 26.06.2019
 * Time: 09:12
 */

namespace Exercise\WeatherModule\Controller\Index;



use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Weather extends Action
{

    protected $_pageFactory;
    /**
     * @var
     */
    private $weatherFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);

    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
