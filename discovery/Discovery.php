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
	* @result String
	* 
	* not allowed for free account
	*/
	public function createEnvironment($url, $username, $password, $environmentName, $environmentDesc, $size) {

		$data["name"] = $environmentName;
		$data["description"] = $environmentDesc;
		$data["size"] = $size;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array (
			"Content-Type: application/json"
		));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data, JSON_UNESCAPED_UNICODE));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		curl_close($ch);

		return $result;
	}

	/*
	* getEnvironments
	* @param url
	* @param username
	* @param password
	* 
	* @result String
	*/
	public function getEnvironments($url, $username, $password) {

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

	/*
	* getEnvironment
	* @param url
	* @param username
	* @param password
	* @environmentId
	* 
	* @result String
	*/
	public function getEnvironment($url, $username, $password, $environmentId) {

		$url = str_replace("{environment_id}", $environmentId, $url);

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

	/*
	* updateEnvironment
	* @param url
	* @param username
	* @param password
	* @environmentId
	* @environmentName
	* @environmentDesc
	* @size
	* 
	* @result String
	* 
	* This operation is invalid for read-only environments
	*/
	public function updateEnvironment($url, $username, $password, $environmentId, $environmentName, $environmentDesc, $size) {

		$url = str_replace("{environment_id}", $environmentId, $url);

		$data["name"] = $environmentName;
		$data["description"] = $environmentDesc;
		$data["size"] = $size;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array (
			"Content-Type: application/json"
		));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
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
	* deleteEnvironment
	* @param url
	* @param username
	* @param password
	* @environmentId
	* 
	* @result String
	* 
	* This operation is invalid for read-only environments
	*/
	public function deleteEnvironment($url, $username, $password, $environmentId) {

		$url = str_replace("{environment_id}", $environmentId, $url);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array (
			"Content-Type: application/json"
		));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		curl_close($ch);

		return $result;
	}

	/*
	* createConfiguration
	* @param url
	* @param username
	* @param password
	* @environmentId
	* @configurationName
	* 
	* @result String
	* 
	* This operation is invalid for read-only environments
	*/
	public function createConfiguration($url, $username, $password, $environmentId, $configurationName) {

		$url = str_replace("{environment_id}", $environmentId, $url);

		$data["name"] = $configurationName;

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
	* getConfigurations
	* @param url
	* @param username
	* @param password
	* @environmentId
	* 
	* @result String
	* 
	*/
	public function getConfigurations($url, $username, $password, $environmentId) {

		$url = str_replace("{environment_id}", $environmentId, $url);

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

	/*
	* getConfiguration
	* @param url
	* @param username
	* @param password
	* @environmentId
	* @configurationId
	* 
	* @result String
	* 
	*/
	public function getConfiguration($url, $username, $password, $environmentId, $configurationId) {

		$url = str_replace("{environment_id}", $environmentId, $url);
		$url = str_replace("{configuration_id}", $configurationId, $url);

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

	/*
	* updateConfiguration
	* @param url
	* @param username
	* @param password
	* @environmentId
	* @configurationId
	* @configurationName
	* 
	* @result String
	* 
	* This operation is invalid for read-only environments
	*/
	public function updateConfiguration($url, $username, $password, $environmentId, $configurationId, $configurationName) {

		$url = str_replace("{environment_id}", $environmentId, $url);
		$url = str_replace("{configuration_id}", $configurationId, $url);

		$data["name"] = $configurationName;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array (
			"Content-Type: application/json"
		));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
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
	* deleteConfiguration
	* @param url
	* @param username
	* @param password
	* @environmentId
	* @configurationId
	* 
	* @result String
	* 
	* This operation is invalid for read-only environments
	*/
	public function deleteConfiguration($url, $username, $password, $environmentId, $configurationId) {

		$url = str_replace("{environment_id}", $environmentId, $url);
		$url = str_replace("{configuration_id}", $configurationId, $url);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array (
			"Content-Type: application/json"
		));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		curl_close($ch);

		return $result;
	}

	/*
	* createCollection
	* @param url
	* @param username
	* @param password
	* @environmentId
	* @collectionName
	* @collectionDesc
	* @configurationId
	* 
	* @result String
	* 
	* This operation is invalid for read-only environments
	*/
	public function createCollection($url, $username, $password, $environmentId, $collectionName, $collectionDesc, $configurationId) {

		$url = str_replace("{environment_id}", $environmentId, $url);

		$data["name"] = $collectionName;
		$data["description"] = $collectionDesc;
		$data["configuration_id"] = $configurationId;

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
	* getCollections
	* @param url
	* @param username
	* @param password
	* @environmentId
	* 
	* @result String
	* 
	*/
	public function getCollections($url, $username, $password, $environmentId) {

		$url = str_replace("{environment_id}", $environmentId, $url);

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

	/*
	* getCollection
	* @param url
	* @param username
	* @param password
	* @environmentId
	* @collectionId
	* 
	* @result String
	* 
	*/
	public function getCollection($url, $username, $password, $environmentId, $collectionId) {

		$url = str_replace("{environment_id}", $environmentId, $url);
		$url = str_replace("{collection_id}", $collectionId, $url);

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

	/*
	* updateCollection
	* @param url
	* @param username
	* @param password
	* @environmentId
	* @collectionId
	* @collectionName
	* @collectionDesc
	* @configurationId
	* 
	* @result String
	* 
	* This operation is invalid for read-only environments
	* 
	*/
	public function updateCollection($url, $username, $password, $environmentId, $collectionId, $collectionName, $collectionDesc, $configurationId) {

		$url = str_replace("{environment_id}", $environmentId, $url);
		$url = str_replace("{collection_id}", $collectionId, $url);

		$data["name"] = $collectionName;
		$data["description"] = $collectionDesc;
		$data["configuration_id"] = $configurationId;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array (
			"Content-Type: application/json"
		));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
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
	* getCollectionFields
	* @param url
	* @param username
	* @param password
	* @environmentId
	* @collectionId
	* 
	* @result String
	* 
	*/
	public function getCollectionFields($url, $username, $password, $environmentId, $collectionId) {

		$url = str_replace("{environment_id}", $environmentId, $url);
		$url = str_replace("{collection_id}", $collectionId, $url);

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

	/*
	* deleteCollection
	* @param url
	* @param username
	* @param password
	* @environmentId
	* @collectionId
	* 
	* @result String
	* 
	* This operation is invalid for read-only environments
	*/
	public function deleteCollection($url, $username, $password, $environmentId, $collectionId) {

		$url = str_replace("{environment_id}", $environmentId, $url);
		$url = str_replace("{collection_id}", $collectionId, $url);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array (
			"Content-Type: application/json"
		));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		curl_close($ch);

		return $result;
	}

	/*
	* createDocument
	* @param url
	* @param username
	* @param password
	* @environmentId
	* @collectionId
	* @documentUrl
	* 
	* @result String
	* 
	* This operation is invalid for read-only environments
	*/
	public function createDocument($url, $username, $password, $environmentId, $collectionId, $documentUrl) {

		$url = str_replace("{environment_id}", $environmentId, $url);
		$url = str_replace("{collection_id}", $collectionId, $url);

		$data["file"] = $documentUrl;

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
	* updateDocument
	* @param url
	* @param username
	* @param password
	* @environmentId
	* @collectionId
	* @documentId
	* @documentUrl
	* 
	* @result String
	* 
	* This operation is invalid for read-only environments
	*/
	public function updateDocument($url, $username, $password, $environmentId, $collectionId, $documentId, $documentUrl) {

		$url = str_replace("{environment_id}", $environmentId, $url);
		$url = str_replace("{collection_id}", $collectionId, $url);
		$url = str_replace("{document_id}", $documentId, $url);

		$data["file"] = $documentUrl;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array (
			"Content-Type: application/json"
		));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
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
	* getDocument
	* @param url
	* @param username
	* @param password
	* @environmentId
	* @collectionId
	* @documentId
	* 
	* @result String
	* 
	* This operation is invalid for read-only environments
	*/
	public function getDocument($url, $username, $password, $environmentId, $collectionId, $documentId) {

		$url = str_replace("{environment_id}", $environmentId, $url);
		$url = str_replace("{collection_id}", $collectionId, $url);
		$url = str_replace("{document_id}", $documentId, $url);

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

	/*
	* deleteDocument
	* @param url
	* @param username
	* @param password
	* @environmentId
	* @collectionId
	* @documentId
	* 
	* @result String
	* 
	* This operation is invalid for read-only environments
	*/
	public function deleteDocument($url, $username, $password, $environmentId, $collectionId, $documentId) {

		$url = str_replace("{environment_id}", $environmentId, $url);
		$url = str_replace("{collection_id}", $collectionId, $url);
		$url = str_replace("{document_id}", $documentId, $url);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array (
			"Content-Type: application/json"
		));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		curl_close($ch);

		return $result;
	}

	/*
	* query
	* @param url
	* @param username
	* @param password
	* @environmentId
	* @collectionId
	* @keywords
	* @count
	* @filter
	* @return
	* 
	* @result String
	* 
	*/
	public function query($url, $username, $password, $environmentId, $collectionId, $keywords, $count, $filter, $return) {

		$url = str_replace("{environment_id}", $environmentId, $url);
		$url = str_replace("{collection_id}", $collectionId, $url);

		$data["query"] = $keywords;
		$data["count"] = $count;
		$data["filter"] = $filter;
		$data["return"] = $return;

		$url = $url . "&query=" . $data["query"] . "&count=" . $data["count"] . "&filter=" . $data["filter"] . "&return=" . $data["return"];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array (
			"Content_type: application/json"
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
