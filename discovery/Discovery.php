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
 Class Discovery {
 	
 		/*
		 * createEnvironment
		 * @param url
		 * @param username
		 * @param password
		 * 
		 * @result json
		 */
 		public function createEnvironment($url, $username, $password) {

	        $ch = curl_init(); 
		    curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
			curl_setopt($ch, CURLOPT_POST, true); 
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$result = curl_exec($ch);
			curl_close($ch);

			return $result;	

	}

 		/*
		 * createEnvironment
		 * @param url
		 * @param username
		 * @param password
		 * 
		 * @result json
		 */
	public function getEnvironments($url, $username, $password) {

	        $ch = curl_init(); 
		    curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$result = curl_exec($ch);
			curl_close($ch);

			return $result;	

	}

 		/*
		 * createEnvironment
		 * @param url
		 * @param username
		 * @param password
		 * @environmentId
		 * @environmentName
		 * @environmentDesc
		 * @size
		 * 
		 * @result json
		 */
	public function updateEnvironment($url, $username, $password, $environmentId, $environmentName, $environmentDesc, $size) {

			$url = str_replace("{environment_id}", $environmentId, $url);

			$data["name"] = $environmentName;
			$data["description"] = $environmentDesc;
			$data["size"] = $size;

			$ch = curl_init(); 
		    curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data, JSON_UNESCAPED_UNICODE));
			curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$result = curl_exec($ch);
			curl_close($ch);

			return $result;	
			
	}

 		/*
		 * createEnvironment
		 * @param url
		 * @param username
		 * @param password
		 * @environmentId
		 * 
		 * @result json
		 */
	public function deleteEnvironment($url, $username, $password, $environmentId) {

			$url = str_replace("{environment_id}", $environmentId, $url);

			$ch = curl_init(); 
		    curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			
			$result = curl_exec($ch);
			curl_close($ch);

			return $result;	
	}
 	
 }
 
?>
