<?php

class Coinsimple_Coinsimple_CallbackController extends Mage_Core_Controller_Front_Action
{

  public function callbackAction() {

    require_once(Mage::getModuleDir('coinsimple_php', 'Coinsimple_Coinsimple') . "/coinsimple_php/src/coinsimple.php");

    $data = json_decode(file_get_contents('php://input'));

    $apiKey = Mage::getStoreConfig('payment/Coinsimple/api_key');
    $businessId = Mage::getStoreConfig('payment/Coinsimple/business_id');

    if($apiKey == null || $businessId == null) {
      throw new Exception("Before using the CoinSimple plugin, you need to enter your business' API Key and Business ID in Magento Admin > Configuration > System > Payment Methods > CoinSimple.");
    }

    $business = new \CoinSimple\Business($businessId, $apiKey);

    if (!$business->validateHash($data->hash, $data->timestamp)) {
      Mage::log("Coinsimple: incorrect callback with incorrect hash.");
      header("HTTP/1.1 500 Internal Server Error");
      return;
    }

    $orderId = intval($data->custom);
    $order = Mage::getModel('sales/order')->load($orderId);

    if(!$order) {
      Mage::log("Coinsimple: incorrect callback with incorrect order ID $orderId.");
      header("HTTP/1.1 500 Internal Server Error");
      return;
    }


    $payment = $order->getPayment();
    Mage::log($payment);
    $payment->setPreparedMessage("Paid with CoinSimple.")
    ->setShouldCloseParentTransaction(true)
    ->setIsTransactionClosed(0);

    $payment->registerCaptureNotification($data->total);

    Mage::dispatchEvent('coinsimple_callback_received', array('status' => "paid", 'order_id' => $orderId));
    $order->save();
  }

}
