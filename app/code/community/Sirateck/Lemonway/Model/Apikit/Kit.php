<?php

class Sirateck_Lemonway_Model_Apikit_Kit{
	
	private static $printInputAndOutputXml = false;
	
	public static function RegisterWallet($params) {
		$res = self::sendRequest('RegisterWallet', $params, '1.1');
		if (!isset($res->lwError)){
			$res->wallet =  Mage::getModel('sirateck_lemonway/apikit_apimodels_wallet',array($res->lwXml->WALLET));//new Wallet($res->lwXml->WALLET);
		}
		return $res;
	}
	public static function MoneyIn($params) {
		$res = self::sendRequest('MoneyIn', $params, '1.1');
		if (!isset($res->lwError)){
			$res->operations = array(Mage::getModel('sirateck_lemonway/apikit_apimodels_operation',array($res->lwXml->TRANS->HPAY)));// array(new Operation($res->lwXml->TRANS->HPAY));
		}
		return $res;
	}
	public static function UpdateWalletDetails($params) {
		$res = self::sendRequest('UpdateWalletDetails', $params, '1.0');
		if (!isset($res->lwError)){
			$res->wallet = Mage::getModel('sirateck_lemonway/apikit_apimodels_wallet',array($res->lwXml->WALLET));
		}
		return $res;
	}
	public static function GetWalletDetails($params) {
		$res = self::sendRequest('GetWalletDetails', $params, '1.5');
		if (!isset($res->lwError)){
			$res->wallet = Mage::getModel('sirateck_lemonway/apikit_apimodels_wallet',array($res->lwXml->WALLET));
		}
		return $res;
	}
	public static function MoneyIn3DInit($params) {
		return self::sendRequest('MoneyIn3DInit', $params, '1.1');
	}
	public static function MoneyIn3DConfirm($params) {
		return self::sendRequest('MoneyIn3DConfirm', $params, '1.1');
	}
	public static function MoneyInWebInit($params) {
		return self::sendRequest('MoneyInWebInit', $params, '1.2');
	}
	public static function RegisterCard($params) {
		return self::sendRequest('RegisterCard', $params, '1.1');
	}
	public static function UnregisterCard($params) {
		return self::sendRequest('UnregisterCard', $params, '1.0');
	}
	public static function MoneyInWithCardId($params) {
		$res = self::sendRequest('MoneyInWithCardId', $params, '1.1');
		if (!isset($res->lwError)){
			$res->operations = array(Mage::getModel('sirateck_lemonway/apikit_apimodels_operation',array($res->lwXml->TRANS->HPAY)));
		}
		return $res;
	}
	public static function MoneyInValidate($params) {
		return self::sendRequest('MoneyInValidate', $params, '1.0');
	}
	public static function SendPayment($params) {
		$res = self::sendRequest('SendPayment', $params, '1.0');
		if (!isset($res->lwError)){
			$res->operations = array(Mage::getModel('sirateck_lemonway/apikit_apimodels_operation',array($res->lwXml->TRANS->HPAY)));
		}
		return $res;
	}
	public static function RegisterIBAN($params) {
		$res = self::sendRequest('RegisterIBAN', $params, '1.1');
		if (!isset($res->lwError)){
			$res->iban = Mage::getModel('sirateck_lemonway/apikit_apimodels_iban',array($res->lwXml->IBAN));;//new Iban($res->lwXml->IBAN);
		}
		return $res;
	}
	public static function MoneyOut($params) {
		$res = self::sendRequest('MoneyOut', $params, '1.3');
		if (!isset($res->lwError)){
			$res->operations = array(Mage::getModel('sirateck_lemonway/apikit_apimodels_operation',array($res->lwXml->TRANS->HPAY)));
		}
		return $res;
	}
	public static function GetPaymentDetails($params) {
		$res = self::sendRequest('GetPaymentDetails', $params, '1.0');
		if (!isset($res->lwError)){
			$res->operations = array();
			foreach ($res->lwXml->TRANS->HPAY as $HPAY){
				$res->operations[] = Mage::getModel('sirateck_lemonway/apikit_apimodels_operation',array($HPAY));
			}
		}
		return $res;
	}
	public static function GetMoneyInTransDetails($params) {
		$res = self::sendRequest('GetMoneyInTransDetails', $params, '1.6');
		if (!isset($res->lwError)){
			$res->operations = array();
			foreach ($res->lwXml->TRANS->HPAY as $HPAY){
				$res->operations[] = Mage::getModel('sirateck_lemonway/apikit_apimodels_operation',array($HPAY));
			}
		}
		return $res;
	}
	public static function GetMoneyOutTransDetails($params) {
		$res = self::sendRequest('GetMoneyOutTransDetails', $params, '1.4');
		if (!isset($res->lwError)){
			$res->operations = array();
			foreach ($res->lwXml->TRANS->HPAY as $HPAY){
				$res->operations[] = Mage::getModel('sirateck_lemonway/apikit_apimodels_operation',array($HPAY));
			}
		}
		return $res;
	}
	public static function UploadFile($params) {
		$res = self::sendRequest('UploadFile', $params, '1.1');
		if (!isset($res->lwError)){
			$res->kycDoc = Mage::getModel('sirateck_lemonway/apikit_apimodels_kyDoc',array($res->lwXml->UPLOAD));;//new KycDoc($res->lwXml->UPLOAD);
		}
		return $res;
	}
	public static function GetKycStatus($params) {
		return self::sendRequest('GetKycStatus', $params, '1.5');
	}
	public static function GetMoneyInIBANDetails($params) {
		return self::sendRequest('GetMoneyInIBANDetails', $params, '1.4');
	}
	public static function RefundMoneyIn($params) {
		return self::sendRequest('RefundMoneyIn', $params, '1.2');
	}
	public static function GetBalances($params) {
		return self::sendRequest('GetBalances', $params, '1.0');
	}
	public static function MoneyIn3DAuthenticate($params) {
		return self::sendRequest('MoneyIn3DAuthenticate', $params, '1.0');
	}
	public static function MoneyInIDealInit($params) {
		return self::sendRequest('MoneyInIDealInit', $params, '1.0');
	}
	public static function MoneyInIDealConfirm($params) {
		return self::sendRequest('MoneyInIDealConfirm', $params, '1.0');
	}
	public static function RegisterSddMandate($params) {
		$res = self::sendRequest('RegisterSddMandate', $params, '1.0');
		if (!isset($res->lwError)){
			$res->sddMandate = Mage::getModel('sirateck_lemonway/apikit_apimodels_sddMandate',array($res->lwXml->SDDMANDATE));;//new SddMandate($res->lwXml->SDDMANDATE);
		}
		return $res;
	}
	public static function UnregisterSddMandate($params) {
		return self::sendRequest('UnregisterSddMandate', $params, '1.0');
	}
	public static function MoneyInSddInit($params) {
		return self::sendRequest('MoneyInSddInit', $params, '1.0');
	}
	public static function GetMoneyInSdd($params) {
		return self::sendRequest('GetMoneyInSdd', $params, '1.0');
	}
	public static function GetMoneyInChequeDetails($params) {
		return self::sendRequest('GetMoneyInChequeDetails', $params, '1.4');
	}
	
	private function printDirectkitOutput($res){
		if (self::$printInputAndOutputXml){
			print '<br/>DEBUG OUTPUT START<br/>';
			foreach ($res[0] as $keyLevel1=>$valueLevel1) {
				print (string)$keyLevel1.' : '.(string)$valueLevel1;
				if ($valueLevel1->count() > 0){
					foreach ($valueLevel1 as $keyLevel2=>$valueLevel2) {
						print '<br/>----'.(string)$keyLevel2.' : '.(string)$valueLevel2;
						if ($valueLevel2->count() > 0){
							foreach ($valueLevel2 as $keyLevel3=>$valueLevel3) {
								print '<br/>--------'.(string)$keyLevel3.' : '.(string)$valueLevel3;
								if ($valueLevel3->count() > 0){
									foreach ($valueLevel3 as $keyLevel4=>$valueLevel4) {
										print '<br/>------------'.(string)$keyLevel4.' : '.(string)$valueLevel4;
									}
								}
							}
						}
					}
				}
			}
			print '<br/>DEBUG OUTPUT END<br/>';
		}
	}
	
	private function printDirectkitInput($string){
		if (self::$printInputAndOutputXml){
			print '<br/>DEBUG INTPUT START<br/>';
			echo htmlentities($string);
			//$xml = new SimpleXMLElement($string); echo $xml->asXML();
			print '<br/>DEBUG INTPUT END<br/>';
		}
	}
	
	/**
	 * 
	 * @param string $methodName
	 * @param array $params
	 * @param float $version
	 * @return Sirateck_Lemonway_Model_Apikit_Apiresponse $apiResponse 
	 */
	private function sendRequest($methodName, $params, $version){
		$ua = '';
		if (isset($_SERVER['HTTP_USER_AGENT']))
			$ua = $_SERVER['HTTP_USER_AGENT'];
		$ip = '';
		if (isset($_SERVER['REMOTE_ADDR']))
			$ip = $_SERVER['REMOTE_ADDR'];
			
		$xml_soap = '<?xml version="1.0" encoding="utf-8"?><soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope"><soap12:Body><'.$methodName.' xmlns="Service_mb">';
		
		foreach ($params as $key => $value) {
			$xml_soap .= '<'.$key.'>'.$value.'</'.$key.'>';
		}
		$xml_soap .= '<version>'.$version.'</version>';
		$xml_soap .= '<wlPass>'.Mage::getStoreConfig('sirateck_lemonway/lemonway_api/api_pass').'</wlPass>';
		$xml_soap .= '<wlLogin>'.Mage::getStoreConfig('sirateck_lemonway/lemonway_api/api_login').'</wlLogin>';
		$xml_soap .= '<language>fr</language>';
		$xml_soap .= '<walletIp>'.$ip.'</walletIp>';
		$xml_soap .= '<walletUa>'.$ua.'</walletUa>';
		
		
		 
		
		$xml_soap .= '</'.$methodName.'></soap12:Body></soap12:Envelope>';
		self::printDirectkitInput($xml_soap);
						
		$headers = array("Content-type: text/xml;charset=utf-8",
						"Accept: application/xml",
						"Cache-Control: no-cache",
						"Pragma: no-cache",
						'SOAPAction: "Service_mb/'.$methodName.'"',
						"Content-length: ".strlen($xml_soap),
		);
		
		Mage::log($xml_soap,null,"debug_lw_soap.log");
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, Mage::getStoreConfig('sirateck_lemonway/lemonway_api/directkit_uri'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_soap);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		try {
			$response = curl_exec($ch);
		} catch (Exception $e) {
			Mage::throwException($e->getMessage());
		}

		$returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$error = true;
		$message = "";
		switch($returnCode){
			case 200:
				//General parsing
				$response = html_entity_decode($response);
				
				$response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $response);
				$response = str_replace('xmlns="Service_mb"', '', $response); //suppress absolute uri warning
				$xml = new SimpleXMLElement($response);
				Mage::log($xml,null,"debug_lw_soap.log");
				$content = $xml->soapBody->{$methodName.'Response'}->{$methodName.'Result'};
				
				curl_close($ch);
				//self::printDirectkitOutput($content);

				$apiResponse = Mage::getSingleton('sirateck_lemonway/apikit_apiresponse',array($content)); 
				return $apiResponse;
				
			case 400:
				$message =  "Bad Request : The server cannot or will not process the request due to something that is perceived to be a client error";
				break;
			case 403:
				$message =  "IP is not allowed to access Lemon Way's API, please contact support@lemonway.fr";
				break;
			case 404:
				$message =  "Check that the access URLs are correct. If yes, please contact support@lemonway.fr";
				break;
			case 500:
				$message =  "Lemon Way internal server error, please contact support@lemonway.fr";
				break;
			default:
				$message = "Code: {$returnCode} not processed!";
				break;
		}
		
		if($error)
		{
			Mage::throwException($message);
		}
		
		curl_close($ch);

	}
	
	public function printCardForm($moneyInToken, $cssUrl = '', $language = 'fr'){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, Mage::getStoreConfig('sirateck_lemonway/lemonway_api/webkit_uri')."?moneyintoken=".$moneyInToken.'&p='.urlencode($cssUrl).'&lang='.$language);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$server_output = curl_exec ($ch);
		if(curl_errno($ch))
		{
			print(curl_error($ch));//TODO : handle error
		} else {
			$returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
			switch($returnCode){
				case 200:
					curl_close ($ch);
					print($server_output);
					break;
				default:
					print($returnCode);//TODO : handle error
					break;
			}
		}
	}
}
?>