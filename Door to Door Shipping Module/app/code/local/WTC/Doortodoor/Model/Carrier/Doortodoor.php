<?php  
    class WTC_Doortodoor_Model_Carrier_Doortodoor     
		extends Mage_Shipping_Model_Carrier_Abstract
		implements Mage_Shipping_Model_Carrier_Interface
	{  
        protected $_code = 'doortodoor';  
      
        /** 
        * Collect rates for this shipping method based on information in $request 
        * 
        * @param Mage_Shipping_Model_Rate_Request $data 
        * @return Mage_Shipping_Model_Rate_Result 
        */  
        public function collectRates(Mage_Shipping_Model_Rate_Request $request)
		{  
			$shipppingCost = $this->calulateShippingCost();
            $result = Mage::getModel('shipping/rate_result');  
            $method = Mage::getModel('shipping/rate_result_method');  
            $method->setCarrier($this->_code);  
            $method->setCarrierTitle($this->getConfigData('title'));
            $method->setMethod($this->_code);  
            $method->setMethodTitle($this->getConfigData('name'));
		    $method->setPrice('0.00');
			$method->setCost('0.00');
            $result->append($method);  
            return $result;  
        }  
		
		public function calulateShippingCost()
		{
			
		}
		
		public function getCsv()
		{
			$csv_products = csv_to_array('var/import/products.csv');
			for($i=0;$i<sizeof($csv_products);$i++) 
			{
				
			}
		}
		
		public function csv_to_array($filename='', $delimiter=',')
		{
			if(!file_exists($filename) || !is_readable($filename))
			return FALSE;
			$header = NULL;
			$data = array();
			if (($handle = fopen($filename, 'r')) !== FALSE)
			{
				while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
				{
					if(!$header)
					$header = $row;
					else
					$data[] = array_combine($header, $row);
				}
				fclose($handle);
			}
			return $data;
		}
		
		
		/**
		 * Get allowed shipping methods
		 *
		 * @return array
		 */
		public function getAllowedMethods()
		{
			return array($this->_code=>$this->getConfigData('name'));
		}
    }  
