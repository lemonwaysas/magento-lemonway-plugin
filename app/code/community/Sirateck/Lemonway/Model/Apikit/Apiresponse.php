<?php
class Sirateck_Lemonway_Model_Apikit_Apiresponse{
	
	function __construct($xmlResponseArr) {
		$xmlResponse = $xmlResponseArr[0];
		$this->lwXml = $xmlResponse;
		if (isset($xmlResponse->E)){
			$this->lwError = Mage::getModel("sirateck_lemonway/apikit_apimodels_lwError",array($xmlResponse->E->Code, $xmlResponse->E->Msg));
		}
    }
	
	/**
     * lwXml
     * @var SimpleXMLElement
     */
    public $lwXml;
	
	/**
     * lwError
     * @var LwError
     */
    public $lwError;
	
	/**
     * wallet
     * @var Wallet
     */
    public $wallet;
	
	/**
     * operations
     * @var array Operation
     */
    public $operations;
	
	/**
     * kycDoc
     * @var KycDoc
     */
    public $kycDoc;
	
	/**
     * iban
     * @var Iban
     */
    public $iban;
	
	/**
     * sddMandate
     * @var SddMandate
     */
    public $sddMandate;
}

?>