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
class ToneAnalyzer {
	
	const BASE_URL = "https://gateway.watsonplatform.net/tone-analyzer/api/v3";
	
	function __construct() {
       
    }

	/*
	* getTone
	* @param username
	* @param password
	* @param text
	* @param version
	* @param tones
	* 
	* @result String
	* 
	*/    
    function getTone($username, $password, $text, $version, $tones) {
           	
        $url = self::BASE_URL . "/tone?version={version}&text={text}&tones={tones}";
        $url = str_replace("{version}", $version, $url);
        $content = str_replace(' ','%20', $text);
        $url = str_replace("{text}", $content, $url);
        $url = str_replace("{tones}", $tones, $url);

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
