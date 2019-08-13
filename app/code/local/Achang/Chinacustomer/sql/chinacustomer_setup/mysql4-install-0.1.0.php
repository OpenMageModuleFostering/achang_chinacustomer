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

/*
$eavConfig  = Mage::getSingleton('eav/config');
$oAttribute = Mage::getSingleton('eav/config')->getAttribute('customer', 'dob');
$oAttribute->setData('is_visible', true);
$oAttribute->save();
*/

$oAttribute = Mage::getSingleton('eav/config')->getAttribute('customer', 'gender');
$oAttribute->setData('is_visible', true);
$oAttribute->save();

$oAttribute = Mage::getSingleton('eav/config')->getAttribute('customer', 'lastname');
$oAttribute->setData('is_required',false );
$oAttribute->save();


$installer->endSetup();

