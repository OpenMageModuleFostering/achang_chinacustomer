<?php
/**
 * Created by  Achang WebDev
 *
 * @copyright Achang WebDev
 * @link http://www.achang.com
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *
 */

class Achang_Chinacustomer_Model_Sales_Quote_Address extends  Mage_Sales_Model_Quote_Address
{
    /**
     * Validate address attribute values
     *
     * @return bool
     */
    public function validate()
    {
        $errors = array();
        $helper = Mage::helper('customer');
        $this->implodeStreetAddress();
        if (!Zend_Validate::is($this->getFirstname(), 'NotEmpty')) {
            $errors[] = $helper->__('Please enter the first name.');
        }

        if (false && !Zend_Validate::is($this->getLastname(), 'NotEmpty')) {
            $errors[] = $helper->__('Please enter the last name.');
        }

        if (!Zend_Validate::is($this->getStreet(1), 'NotEmpty')) {
            $errors[] = $helper->__('Please enter the street.');
        }

        if (!Zend_Validate::is($this->getCity(), 'NotEmpty') && !Zend_Validate::is($this->getCityId(), 'NotEmpty')) {
            $errors[] = $helper->__('Please enter the city.');
        }

        if (!Zend_Validate::is($this->getTelephone(), 'NotEmpty') && !Zend_Validate::is($this->getCityId(), 'NotEmpty')) {
            $errors[] = $helper->__('Please enter the right telephone number.');
        }

        /*        if (!Zend_Validate::is($this->getTelephone(), 'Zend_Validate_StringLength',array('min' => 11,'max' =>11)) || !Zend_Validate::is($this->getTelephone(), 'Zend_Validate_Digits')) {
                    $errors[] = $helper->__('Please enter the right telephone number.');
                }*/

        $_havingOptionalZip = Mage::helper('directory')->getCountriesWithOptionalZip();
        if (!in_array($this->getCountryId(), $_havingOptionalZip) && !Zend_Validate::is($this->getPostcode(), 'NotEmpty')) {
            $errors[] = $helper->__('Please enter the zip/postal code.');
        }

        if (!Zend_Validate::is($this->getCountryId(), 'NotEmpty')) {
            $errors[] = $helper->__('Please enter the country.');
        }

        if ($this->getCountryModel()->getRegionCollection()->getSize()
            && !Zend_Validate::is($this->getRegionId(), 'NotEmpty')) {
            $errors[] = $helper->__('Please enter the state/province.');
        }

        if (empty($errors) || $this->getShouldIgnoreValidation()) {
            return true;
        }
        return $errors;
    }
}
