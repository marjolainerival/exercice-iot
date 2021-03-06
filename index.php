<!DOCTYPE html>
<html>
<head>
    <title>Web Search</title>
</head>
<body>
    <?php
    // This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
    require_once '/pear/HTTP/Request2.php';
    require __DIR__ . '/vendor/autoload.php';

    $host = 'Hostname';
    $deviceId = 'DeviceName';
    $deviceKey = 'DeviceKey';

    $client = new AzureIoTHub\DeviceClient($host, $deviceId, $deviceKey);

    $request = new Http_Request2('https://api.cognitive.microsoft.com/bing/v5.0/search');
    $url = $request->getUrl();

    $headers = array(
        // Request headers
        'Ocp-Apim-Subscription-Key' => 'YourSubscriptionKey',
    );

    $request->setHeader($headers);

    ?>

    <form action="#" method="get">
         <p>Entrez votre recherche: <input type="text" name="search" /></p>
         <p><input type="submit" value="OK"></p>
    </form>

    <?php

    $research = $_GET['search'];
    $parameters = array(
        // Request parameters
        'q' => $research,
        'count' => '10',
        'offset' => '0',
        'mkt' => 'en-us',
        'safesearch' => 'Moderate',
    );

    //$client->sendEvent($research);

    $url->setQueryVariables($parameters);

    $request->setMethod(HTTP_Request2::METHOD_GET);
    $client->sendEvent($research);

    // Request body
    $request->setBody("{body}");

    try
    {
        $response = $request->send();
        echo $response->getStatus();
        echo $response->getBody();

    }
    catch (HttpException $ex)
    {
        echo $ex;
    }

    ?>
</body>
</html>
