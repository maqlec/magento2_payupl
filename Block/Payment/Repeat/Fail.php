<?php
/**
 * @copyright Copyright (c) 2015 Orba Sp. z o.o. (http://orba.pl)
 */

namespace Orba\Payupl\Block\Payment\Repeat;

class Fail extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Orba\Payupl\Helper\Payment
     */
    protected $_paymentHelper;

    /**
     * @var \Orba\Payupl\Model\Session
     */
    protected $_session;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Orba\Payupl\Model\Session $session,
        \Orba\Payupl\Helper\Payment $paymentHelper,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $data
        );
        $this->_session = $session;
        $this->_paymentHelper = $paymentHelper;
    }

    public function getRepeatPaymentUrl()
    {
        $orderId = $this->_session->getLastOrderId();
        if ($orderId) {
            return $this->_paymentHelper->getRepeatPaymentUrl($orderId);
        }
        return false;
    }
}