# Personality Insights

## Usage
Use linguistic analytics to infer personality and social characteristics, including Big Five, Needs, and Values, from text.  
Example: Analyze text and get a personality profile using the [Personality Insights][personality_insights] service.

```php
$text = "You are particular, analytical and shrewd. You are assertive: you tend to speak up and take charge of situations, and you are comfortable leading groups. You are philosophical: you are open to and intrigued by new ideas and love to explore them. And you are empathetic: you feel what others feel and are compassionate towards them. Your choices are driven by a desire for organization. You are relatively unconcerned with both achieving success and taking pleasure in life. You make decisions with little regard for how they show off your talents. And you prefer activities with a purpose greater than just personal enjoyment.";

$pi = new PersonalityInsights();
$pi->getProfile($username, $password, $text);
```

[personality_insights]: http://www.ibm.com/watson/developercloud/doc/personality-insights/