<?php
$installer = $this;
$installer->startSetup();
$installer->addAttribute('catalog_product', 'shipping_type', array(
    'group'             => 'General',
    'type'              => 'text',
    'backend'           => '',
	'input'				=> 'select',
	'source'            => 'doortodoor/catalog_product_attribute',
    'label'             => 'Shipping Type',
    'class'             => '',
    'global'            => 1,
    'visible'           => true,
    'required'          => false,
    'user_defined'      => true,
    'searchable'        => false,
    'filterable'        => false,
    'comparable'        => false,
    'visible_on_front'  => false,
    'unique'            => false,
    'apply_to'          => 'simple,configurable,bundle,grouped',
    'is_configurable'   => false,
));
$installer->endSetup();
	 