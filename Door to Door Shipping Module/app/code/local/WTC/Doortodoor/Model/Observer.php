<?php
class WTC_Doortodoor_Model_Observer
{
	public function saveShippingMethod(Varien_Event_Observer $observer)
	{
		$shipping = $observer->getEvent()->getQuote()->getShippingAddress();
		$shippingMethod = $_POST['shipping_method'];
		if($shippingMethod == 'doortodoor_doortodoor')
		{
			$shipping->setCollectShippingRates(true);
		}
	}	
}
