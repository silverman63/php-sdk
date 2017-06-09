# Natural Language Understanding


## Usage
The [Natural Language Understanding][natural-language-understanding] wraps the environment, collection, configuration, document, and query operations of the Discovery service.

```php
$url = "https://gateway.watsonplatform.net/natural-language-understanding/api/v1/analyze?version=2017-02-27";

$data["text"]="IBM is an American multinational technology company headquartered in Armonk, New York, United States, with operations in over 170 countries.";
$data["features"]["entities"]["emotion"]=true;
$data["features"]["entities"]["sentiment"]=true;
$data["features"]["entities"]["limit"]=2;
$data["keywords"]["entities"]["emotion"]=true;
$data["keywords"]["entities"]["sentiment"]=true;
$data["keywords"]["entities"]["limit"]=2;

$nlu = new NaturalLanguageUnderstanding();
$nlu->analyzePost($url, $username, $password, $data);
```

[natural-language-understanding]: http://www.ibm.com/watson/developercloud/doc/natural-language-understanding/