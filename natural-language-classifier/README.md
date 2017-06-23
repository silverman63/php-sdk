# Natural Language Classifier

## Usage
Use [Natural Language Classifier][natural-language-classifier] service to create a classifier instance by providing a set of representative strings and a set of one or more correct classes for each as training. Then use the trained classifier to classify your new question for best matching answers or to retrieve next actions for your application.

```php

$nlc = new NaturalLanguageClassifier();
$nlc->classify($username, $password, $classifierId, "Is it sunny?");
```

[natural-language-classifier]: http://www.ibm.com/watson/developercloud/doc/natural-language-classifier/index.html