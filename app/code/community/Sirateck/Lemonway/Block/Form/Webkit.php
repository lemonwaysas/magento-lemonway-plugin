<?php
/**
 * Sirateck_Lemonway extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @category       Sirateck
 * @package        Sirateck_Lemonway
 * @copyright      Copyright (c) 2015
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */

/**
 * Block for select payment method FORM
 * 
 * @author Kassim Belghait <kassim@sirateck.com>
 */
class Sirateck_Lemonway_Block_Form_Webkit extends Mage_Payment_Block_Form
{
	
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('lemonway/form/webkit.phtml');
    }
    
    /**
     * 
     * @return Mage_Checkout_Model_Session
     */
    public function getCheckout()
    {
    	return Mage::getSingleton('checkout/session');
    }
    
    /**
     * 
     * @return Mage_Sales_Model_Quote
     */
    public function getQuote()
    {
    	return $this->getCheckout()->getQuote();
    }

}
