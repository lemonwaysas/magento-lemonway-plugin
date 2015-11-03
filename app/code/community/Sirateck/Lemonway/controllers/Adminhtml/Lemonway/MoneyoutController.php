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
 * Wallet admin controller
 *
 * @category    Sirateck
 * @package     Sirateck_Lemonway
 * @author Kassim Belghait kassim@sirateck.com
 */
class Sirateck_Lemonway_Adminhtml_Lemonway_MoneyoutController extends Sirateck_Lemonway_Controller_Adminhtml_Lemonway
{


    /**
     * view action
     *
     * @access public
     * @return void
     * @author Kassim Belghait kassim@sirateck.com
     */
    public function payAction()
    {
        $this->loadLayout();
        $this->_title(Mage::helper('sirateck_lemonway')->__('LW'))
             ->_title(Mage::helper('sirateck_lemonway')->__('MoneyOut'));
        $this->renderLayout();
    }

    /**
     * Check if admin has permissions to visit related pages
     *
     * @access protected
     * @return boolean
     * @author Kassim Belghait kassim@sirateck.com
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('sales/sirateck_lemonway/moneyout');
    }
}
