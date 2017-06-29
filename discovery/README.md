# Discovery


## Usage
The [Discovery][discovery] wraps the environment, collection, configuration, document, and query operations of the Discovery service.

```php
$keywords = "IBM";
$count = 15;
$filter = "entities.text:IBM";
$return = "title,enrichedTitle.text,url,host,blekko.chrondate";

$discovery = new Discovery();
$discovery->query($username, $password, $environmentId, $collectionId, $keywords, $count, $filter, $return);
```

[discovery]: http://www.ibm.com/watson/developercloud/doc/discovery/