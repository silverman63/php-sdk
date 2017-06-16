<?php

/*
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

	function __construct() {
       
    }

	/*
	* analyze
	* @param username
	* @param password
	* @param features
	* @param input
	* @param inputType
	* 
	* @result String
	* 
	*/
	function analyze($username, $password, $features, $input, $inputType) {

		$url = self::BASE_URL . "/analyze?version=2017-02-27";
		$data = $features;
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
		curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		curl_close($ch);

		return $result;

	}

	/*
	* analyzeGet
	* @param username
	* @param password
	* 
	* @result String
	* 
	*/
	function analyzeGet($username, $password) {

		$url = self::BASE_URL . "/analyze?version=2017-02-27";
		$url = $url . "&url=www.ibm.com&features=keywords&entities.emotion=true&entities.sentiment=true&keywords.emotion=true&keywords.sentiment=true";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array (
			"Content-Type: application/json"
		));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

		curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		curl_close($ch);

		return $result;

	}

}
?>
