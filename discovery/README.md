# Discovery


## Usage
The [Discovery][discovery] wraps the environment, collection, configuration, document, and query operations of the Discovery service.

```php
$queryUrl = "https://gateway.watsonplatform.net/discovery/api/v1/environments/{environment_id}/collections/{collection_id}/query?version=2016-12-01";

$keywords = "IBM";
$count = 15;
$filter = "entities.text:IBM";
$return = "title,enrichedTitle.text,url,host,blekko.chrondate";

$discovery = new Discovery();
$discovery->query($queryUrl, $username, $password, $environmentId, $collectionId, $keywords, $count, $filter, $return);
```

[discovery]: http://www.ibm.com/watson/developercloud/doc/discovery/