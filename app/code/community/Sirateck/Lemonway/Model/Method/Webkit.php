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
 * Method  standard model
 *
 * @category    Sirateck
 * @package     Sirateck_Lemonway
 * @author Kassim Belghait kassim@sirateck.com
 */
 class Sirateck_Lemonway_Model_Method_Webkit extends Mage_Payment_Model_Method_Abstract{


 	protected $_code  = 'lemonway_webkit';
 	protected $_formBlockType = 'sirateck_lemonway/form_webkit';
 	protected $_infoBlockType = 'sirateck_lemonway/info_webkit';

 	/**
     * Availability options
     */
    protected $_isGateway              = true;
    protected $_canAuthorize           = true;
    protected $_canCapture             = true;
    protected $_canCapturePartial      = false;
    protected $_canRefund              = false;
    protected $_canVoid                = false;
    protected $_canUseInternal         = false;
    protected $_canUseCheckout         = true;
    protected $_canUseForMultishipping = false;
 	protected $_isInitializeNeeded 	   = true; // when initialize we get token for webkit url

    protected $_order;

    protected $_supportedLangs = array('no', 'jp', 'ko', 'sp', 'fr', 'xz', 'ge', 'it', 'br', 'da', 'fi', 'sw', 'po', 'fl', 'ci', 'pl','ne');
    protected $_defaultLang    = 'en';
    
    /**
     * @return Mage_Checkout_Model_Session
     */
    protected function _getCheckout()
    {
    	return Mage::getSingleton('checkout/session');
    }

    public function initialize($paymentAction, $stateObject){

    	//call directkit to get Webkit Token
    	$params = array('wkToken'=>$this->getOrder()->getIncrementId(),
    			'wallet'=> Mage::getStoreConfig('sirateck_lemonway/lemonway_api/wallet_merchant'),
    			'amountTot'=>sprintf("%.2f" ,(float)$this->getOrder()->getGrandTotal()),
    			'amountCom'=>sprintf("%.2f" ,(float)str_replace(",",".",$this->getConfigData('commission_amount'))),
    			'comment'=>'',
    			'returnUrl'=>urlencode(Mage::getUrl($this->getConfigData('return_url'))),
    			'cancelUrl'=>urlencode(Mage::getUrl($this->getConfigData('cancel_url'))),
    			'errorUrl'=>urlencode(Mage::getUrl($this->getConfigData('error_url'))),
    			'autoCommission'=>$this->getConfigData('autocommission'));
    	$this->_debug($params);
    	$res = Sirateck_Lemonway_Model_Apikit_Kit::MoneyInWebInit($params);
    	$this->_debug($res);

    	if (isset($res->lwError)){
    		Mage::throwException("Error code: " . $res->lwError->CODE . " Message: " . $res->lwError->MSG);
    	}
		$moneyInToken = (string)$res->lwXml->MONEYINWEB->TOKEN;
    	$this->getInfoInstance()->setAdditionalInformation('moneyin_token',$moneyInToken);
    	$this->_getCheckout()->setMoneyInToken($moneyInToken);

    }

    /**
     * Retrieve payment iformation model object
     *
     * @return Mage_Payment_Model_Info
     */
    public function getInfoInstance()
    {
    	$instance = $this->getData('info_instance');
    	if (!($instance instanceof Mage_Payment_Model_Info)) {
    		Mage::throwException(Mage::helper('payment')->__('Cannot retrieve the payment information object instance.'));
    	}
    	return $instance;
    }

    /**
     * Get order model
     *
     * @return Mage_Sales_Model_Order
     */
    public function getOrder()
    {
    	if (!$this->_order) {
    		$this->_order = $this->getInfoInstance()->getOrder();
    	}
    	return $this->_order;
    }

    /**
     * Return url for redirection after order placed
     * @return string
     */
    public function getOrderPlaceRedirectUrl()
    {
    	$moneyInToken = $this->_getCheckout()->getMoneyInToken();
    	$this->_getCheckout()->unsMoneyInToken();

    	$cssUrl = $this->getConfigData('css_url');
    	//Redirect to webkit page
    	return Mage::getStoreConfig('sirateck_lemonway/lemonway_api/webkit_uri') . "?moneyintoken=".$moneyInToken.'&p='.urlencode($cssUrl).'&lang='.$this->getLang();
    }


    /**
     * Return url current lang code
     *
     * @return string
     */
    public function getLang()
    {
    	$locale = explode('_', Mage::app()->getLocale()->getLocaleCode());
    	if (is_array($locale) && !empty($locale) && in_array($locale[0], $this->_supportedLangs)) {
    		return $locale[0];
    	}
    	return $this->getDefaultLang();
    }

    /*
     Generate random ID for wallet IDs or tokens
     */
    private function getRandomId(){
    	return str_replace('.', '', microtime(true).rand());
    }

 }
