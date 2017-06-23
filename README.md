# Watson Developer Cloud PHP SDK

The PHP SDK uses the [Watson Developer Cloud][wdc] services, a collection of REST APIs and SDKs that use cognitive computing to solve complex problems.

## Table of Contents
  * [Installation](#installation)
    * [Composer](#composer)
  * [Usage](#usage)
  * [Getting the Service Credentials](#getting-the-service-credentials)
  * [Questions](#questions)
  * IBM Watson Services
    * [Discovery](discovery)
    * [Natural Language Understanding](natural-language-understanding)
    * [Natural Language Classifier](natural-language-classifier)

## Installation

##### Composer

All the services:

```composer
'composer require watson-developer-cloud/php-sdk'
```
or

Add require to your project composer.json file

```composer
{
    "require": {
        "watson-developer-cloud/php-sdk": "^3.1"
    }
}
```
## Usage

The examples within each service assume that you already have service credentials. If not,
you will have to create a service in [Bluemix][bluemix].

If you are running your application in Bluemix, you don't need to specify the
credentials; the library will get them for you by looking at the `VCAP_SERVICES` environment variable.

## Getting the Service Credentials
You will need the `username` and `password` (`api_key` for Discovery API) credentials for each service. Service credentials are different from your Bluemix account username and password.

To get your service credentials, follow these steps:
 1. Log in to Bluemix at https://bluemix.net.

 1. Create an instance of the service:
     1. In the Bluemix **Catalog**, select the service you want to use.
     1. Under **Add Service**, type a unique name for the service instance in the Service name field. For example, type `my-service-name`. Leave the default values for the other options.
     1. Click **Create**.

 1. Copy your credentials:
     1. On the left side of the page, click **Service Credentials** to view your service credentials.
     1. Copy `username` and `password`(`api_key` for Discovery API).

Once you have credentials, copy config.properties.example to src/test/resources/config.properties, and fill them in as necessary.

## Questions

If you are having difficulties using the APIs or you have a question about the IBM
Watson Services, please ask a question on
[dW Answers](https://developer.ibm.com/answers/questions/ask/?topics=watson)
or [Stack Overflow](http://stackoverflow.com/questions/ask?tags=ibm-watson).

## License

This library is licensed under Apache 2.0. Full license text is
available in [LICENSE](LICENSE).

[wdc]: http://www.ibm.com/watson/developercloud/
[bluemix]: https://console.ng.bluemix.net
[Gradle]: http://www.gradle.org/
[OkHttp]: http://square.github.io/okhttp/
[gson]: https://github.com/google/gson
[apache_maven]: http://maven.apache.org/
[sonatype_snapshots]: https://oss.sonatype.org/content/repositories/snapshots/com/ibm/watson/developer_cloud/
