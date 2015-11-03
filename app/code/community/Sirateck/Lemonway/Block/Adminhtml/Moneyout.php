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
 * Wallet admin block
 *
 * @category    Sirateck
 * @package     Sirateck_Lemonway
 * @author Kassim Belghait kassim@sirateck.com
 */
class Sirateck_Lemonway_Block_Adminhtml_Moneyout extends Mage_Adminhtml_Block_Template
{
	protected $_wallet = null;
	
	/**
	 * Get page header text
	 *
	 * @return string
	 */
	protected function getHeader()
	{
		return $this->__("Money out");
	}
	
	/**
	 * Get html code of pay button
	 *
	 * @return string
	 */
	protected function getPayButtonHtml()
	{
		return $this->getChildHtml('pay_button');
	}
	
	/**
	 * Get process pay url
	 *
	 * @return string
	 */
	public function getPayFormAction()
	{
		return $this->getUrl('*/*/payPost');
	}
	
	/**
	 * Check if main wallet is configured and if Iban is present
	 * @TODO check validation (wallet exist and have a positive balance,iban exist and status is ok)
	 * @return bool
	 */
	public function canPayMoneyOut()
	{
		return true;
	}
	
	public function getWallet(){
		if(is_null($this->_wallet))
		{
			$params = array("wallet"=>Mage::getStoreConfig('sirateck_lemonway/lemonway_api/wallet_merchant_id'),
					"email"=>Mage::getStoreConfig('sirateck_lemonway/lemonway_api/wallet_merchant_email')
			);
			$this->_wallet = Sirateck_Lemonway_Model_Apikit_Kit::GetWalletDetails($params)->wallet;
		}
		
		return $this->_wallet;
		
	}
	
	
}
