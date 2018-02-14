<?php

/*
 * Modified from https://github.com/ThomasIBM/php-sdk
 * - User/Pass in constructor
 * - Added constants for url/html input type / analyzeUrl & analyzeHtml functions
 *
 *
 * Copyright 2017 IBM Corp. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with
 * the License. You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on
 * an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the
 * specific language governing permissions and limitations under the License.
 */


class NaturalLanguageUnderstanding {

	const BASE_URL = "https://gateway.watsonplatform.net/natural-language-understanding/api/v1";

	const INPUT_TYPE_URL = "url";
	const INPUT_TYPE_HTML = "html";

	private $username;
	private $password;

	function __construct($username, $password) {
	    $this->username = $username;
	    $this->password = $password;
    }

	public function analyzeUrl($url, $features) {
	    return $this->analyze(self::INPUT_TYPE_URL, $url, $features);
    }

    public function analyzeHtml($html, $features) {
	    return $this->analyze(self::INPUT_TYPE_HTML, $html, $features);
    }

    /**
	* analyze
	* @param input
	* @param inputType
    * @param $features
	* 
	* @return array
	*
	*/
	private function analyze($inputType, $input, $features) {

		$url = self::BASE_URL . "/analyze?version=2017-02-27";
		$data = ["features" => $features];
		$data[$inputType]=$input;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array (
			"Content-Type: application/json"
		));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data, JSON_UNESCAPED_UNICODE));
		curl_setopt($ch, CURLOPT_USERPWD, $this->username . ':' . $this->password);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		curl_close($ch);

		return json_decode($result, true);
	}
	
	/*
	* getModels
	* @param username
	* @param password
	* 
	* @result String
	* 
	*/	
	function getModels() {

		$url = self::BASE_URL . "/models?version=2017-02-27";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array (
			"Content-Type: application/json"
		));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

		curl_setopt($ch, CURLOPT_USERPWD, $this->username . ':' . $this->password);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		curl_close($ch);

		return $result;

	}

	/*
	* deleteModel
	* @param username
	* @param password
	* @param modelId
	* 
	* @result String
	* 
	*/
	function deleteModel($modelId) {

		$url = self::BASE_URL . "/models/{model_id}?version=2017-02-27";
		$url = str_replace("{model_id}", $modelId, $url);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array (
			"Content-Type: application/json"
		));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

		curl_setopt($ch, CURLOPT_USERPWD, $this->username . ':' . $this->password);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		curl_close($ch);

		return $result;

	}

}

?>
