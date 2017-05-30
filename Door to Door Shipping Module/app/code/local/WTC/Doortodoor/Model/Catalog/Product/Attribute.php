<?php
class WTC_Doortodoor_Model_Catalog_Product_Attribute extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
	
    public function getAllOptions()
    {
		$shippingTypes = Mage::getStoreConfig('carriers/doortodoor/shipping_types');
		$types = explode(',',$shippingTypes); 
        if (is_null($this->_options)) 
		{
			
				foreach($types as $type)
				{
					// strip out all whitespace
					$type_space = preg_replace('/\s*/', '', $type);
					// convert the string to all lowercase
					$typeval = strtolower($type_space);
					$this->_options[] = 
						array
						(
						'label' => Mage::helper('doortodoor')->__($type),
						'value' =>  $typeval
						);
				}
			return $this->_options;
		}
    }
	
	public function toOptionArray()
    {
        return $this->getAllOptions();
    }
    
}
