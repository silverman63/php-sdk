# Tone Analyzer

## Usage
Use the [Tone Analyzer][tone_analyzer] service to get the tone of your email.

```php
$text = "I know the times are difficult! Our sales have been disappointing for the past three quarters for our data analytics product suite. We have a competitive data analytics product suite in the industry. But we need to do our job selling it! We need to acknowledge and fix our sales challenges. We can’t blame the economy for our lack of execution! We are missing critical sales opportunities. Our product is in no way inferior to the competitor products. Our clients are hungry for analytical tools to improve their business outcomes. Economy has nothing to do with it.";
$version = "2016-05-19";
$tones = "emotion";

$ta = new ToneAnalyzer();
$ta->getProfile($username, $password, $text, $version, $tones);
```

[tone_analyzer]: https://www.ibm.com/watson/developercloud/doc/tone-analyzer/index.html