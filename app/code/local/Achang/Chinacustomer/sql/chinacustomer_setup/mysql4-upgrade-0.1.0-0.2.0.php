<?php
/**
 * Created by  Achang WebDev
 *
 * @copyright Achang WebDev
 * @link http://www.achang.com
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *
 */
$installer = $this;
$installer->startSetup();


$eavConfig = Mage::getSingleton('eav/config');

$attributes = array(
    'prefix',
    'middlename',
    'lastname',
    'suffix',
    'taxvat',
    'fax',
);

$defaultUsedInForms = array(
);

foreach ($attributes as $attributeCode) {
    $attribute = $eavConfig->getAttribute('customer', $attributeCode);
    if (!$attribute) {
        continue;
    }
    $where = array('attribute_id=?' => $attribute->getId());
    $installer->getConnection()->delete($installer->getTable('customer/form_attribute'), $where);
}

foreach ($attributes as $attributeCode) {
    $attribute = $eavConfig->getAttribute('customer_address', $attributeCode);
    if (!$attribute) {
        continue;
    }
    $where = array('attribute_id=?' => $attribute->getId());
    $installer->getConnection()->delete($installer->getTable('customer/form_attribute'), $where);
}

$installer->endSetup();
