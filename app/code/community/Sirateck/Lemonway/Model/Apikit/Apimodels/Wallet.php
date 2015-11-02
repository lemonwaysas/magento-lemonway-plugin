<?php

class Sirateck_Lemonway_Model_Apikit_Apimodels_Wallet{

	/**
     * ID as defined by merchant
     * @var string
     */
    public $ID;
	
	/**
     * LWID number ID as defined by Lemon Way
     * @var string
     */
    public $LWID;
	
	/**
     * STATUS {2,3,4,5,6,7,8,12}
     * @var string
     */
    public $STATUS;
	
	/**
     * BAL balance
     * @var string
     */
    public $BAL;
	
	/**
     * NAME full name
     * @var string
     */
    public $NAME;
	
	/**
     * EMAIL
     * @var string
     */
    public $EMAIL;
	
	/**
     * kycDocs
     * @var array KycDoc
     */
    public $kycDocs;
	
	/**
     * ibans 
     * @var array Iban
     */
    public $ibans;
	
	/**
     * sddMandates 
     * @var array SddMandate
     */
    public $sddMandates;
	
	function __construct($WALLETArr) {
		$WALLET = $WALLETArr[0];
		$this->ID = $WALLET->ID;
		$this->LWID = $WALLET->LWID;
		$this->STATUS = $WALLET->STATUS;
		$this->BAL = $WALLET->BAL;
		$this->NAME = $WALLET->NAME;
		$this->EMAIL = $WALLET->EMAIL;
		$this->kycDocs = array();
		if (isset($WALLET->DOCS))
			foreach ($WALLET->DOCS->DOC as $DOC){
				$this->kycDocs[] = Mage::getModel('sirateck_cashway/apikit_apimodels_kyDoc',array($DOC));//new KycDoc($DOC);
			}
		$this->ibans = array();
		if (isset($WALLET->IBANS))
			foreach ($WALLET->IBANS->IBAN as $IBAN){
				$this->ibans[] = Mage::getModel('sirateck_cashway/apikit_apimodels_iban',array($IBAN));//new Iban($IBAN);
			}
		$this->sddMandates = array();
		if (isset($WALLET->SDDMANDATES))
			foreach ($WALLET->SDDMANDATES->SDDMANDATE as $SDDMANDATE){
				$this->sddMandates[] = Mage::getModel('sirateck_cashway/apikit_apimodels_ssdMandate',array($SDDMANDATE));//new SddMandate($SDDMANDATE);
			}
	}
	
}
