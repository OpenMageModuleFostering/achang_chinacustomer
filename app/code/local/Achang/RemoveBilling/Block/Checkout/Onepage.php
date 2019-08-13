<?php
/**
 * Created by  Achang WebDev
 *
 * @file Onepage.php
 * @author Owen <owen@achang.com>
 * @copyright Achang WebDev 
 * @link http://www.achang.com
 *
 * Date Time: 13-8-2 上午10:43
 */

class Achang_RemoveBilling_Block_Checkout_Onepage extends Mage_Checkout_Block_Onepage
{
    public function getSteps()
    {
        $steps = array();

        if (!$this->isCustomerLoggedIn()) {
            $steps['login'] = $this->getCheckout()->getStepData('login');
        }

        $stepCodes = array('billing',  'shipping_method', 'payment', 'review','shipping');

        foreach ($stepCodes as $step) {
            $steps[$step] = $this->getCheckout()->getStepData($step);
        }
        return $steps;
    }
}