<?php

class Coinsimple_Coinsimple_Model_PaymentMethod extends Mage_Payment_Model_Method_Abstract
{
  protected $_code = 'Coinsimple';

  /**
  * Is this payment method a gateway (online auth/charge) ?
  */
  protected $_isGateway               = true;

  /**
  * Can authorize online?
  */
  protected $_canAuthorize            = true;

  /**
  * Can capture funds online?
  */
  protected $_canCapture              = false;

  /**
  * Can capture partial amounts online?
  */
  protected $_canCapturePartial       = false;

  /**
  * Can refund online?
  */
  protected $_canRefund               = false;

  /**
  * Can void transactions online?
  */
  protected $_canVoid                 = false;

  /**
  * Can use this payment method in administration panel?
  */
  protected $_canUseInternal          = true;

  /**
  * Can show this payment method as an option on checkout payment page?
  */
  protected $_canUseCheckout          = true;

  /**
  * Is this payment method suitable for multi-shipping checkout?
  */
  protected $_canUseForMultishipping  = true;

  /**
  * Can save credit card information for future processing?
  */
  protected $_canSaveCc = false;


  public function authorize(Varien_Object $payment, $amount)
  {

    require_once(Mage::getModuleDir('coinsimple_php', 'Coinsimple_Coinsimple') . "/coinsimple_php/src/coinsimple.php");

    $apiKey = Mage::getStoreConfig('payment/Coinsimple/api_key');
    $businessId = Mage::getStoreConfig('payment/Coinsimple/business_id');

    if($apiKey == null || $businessId == null) {
      throw new Exception("Before using the CoinSimple plugin, you need to enter your business' API Key and Business ID in Magento Admin > Configuration > System > Payment Methods > CoinSimple.");
    }

    $business = new \CoinSimple\Business($businessId, $apiKey);

    $order = $payment->getOrder();
    $currency = strtolower($order->getBaseCurrencyCode());

    $successUrl = Mage::getStoreConfig('payment/Coinsimple/custom_success_url');

    if ($successUrl == false) {
      $successUrl = Mage::getUrl('coinsimple_coinsimple'). 'redirect/success/';
    }

    $name = $order->getCustomerFirstname() . ' ' . $order->getCustomerLastname();
    $custom = $order->getId();

    $address = $order->getBillingAddress();
    $email = $address->getEmail();

    $params = array(
    'callback_url' => Mage::getUrl('coinsimple_coinsimple'). 'callback/callback/',
    'redirect_url' => $successUrl,
    'name' => $name,
    'custom' => $custom,
    'email' => $email,
    'currency' => strtolower(Mage::app()->getStore()->getCurrentCurrencyCode()),
    'items' => array(
    array('price' => $amount, 'quantity' => 1, 'description' => "Order #" . $order->getIncrementId())
    )
    );

    $invoice = new \CoinSimple\Invoice($params);
    $res = $business->sendInvoice($invoice);

    if ($res->status == "error") {
      throw new Exception("Could not generate new invoice. Double check your API Key and Secret. " . $res->error());
    } else {
      $redirectUrl = $res->url;

      $payment->setIsTransactionPending(true);
      Mage::getSingleton('customer/session')->setRedirectUrl($redirectUrl);
    }

    return $this;
  }


  public function getOrderPlaceRedirectUrl()
  {
    return Mage::getSingleton('customer/session')->getRedirectUrl();
  }
}
?>
