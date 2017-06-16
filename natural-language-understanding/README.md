# Natural Language Understanding


## Usage
The [Natural Language Understanding][natural-language-understanding] wraps the environment, collection, configuration, document, and query operations of the Discovery service.

```php
$inputText = "IBM is an American multinational technology company headquartered in Armonk, New York, United States.";

$features["features"]["entities"]["emotion"]=true;
$features["features"]["entities"]["sentiment"]=true;
$features["features"]["entities"]["limit"]=2;
$features["keywords"]["entities"]["emotion"]=true;
$features["keywords"]["entities"]["sentiment"]=true;
$features["keywords"]["entities"]["limit"]=2;

$nlu = new NaturalLanguageUnderstanding();
$nlu->analyze($username, $password, $features, $inputText, "text");
```

[natural-language-understanding]: http://www.ibm.com/watson/developercloud/doc/natural-language-understanding/