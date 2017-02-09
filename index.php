<!DOCTYPE html>
<html>
<head>
    <title>Web Search</title>
</head>
<body>
    <?php
    // This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
    require_once 'HTTP/Request2.php';

    $request = new Http_Request2('https://api.cognitive.microsoft.com/bing/v5.0/search');
    $url = $request->getUrl();

    $headers = array(
        // Request headers
        'Ocp-Apim-Subscription-Key' => '5860f6d64f9d4e5883419b5c11d298ad',
    );

    $request->setHeader($headers);

    ?>

    <form action="#" method="get">
         <p>Entrez votre recherche: <input type="text" name="search" /></p>
         <p><input type="submit" value="OK"></p>
    </form>

    <?php
    $parameters = array(
        // Request parameters
        'q' => $_GET['search'],
        'count' => '10',
        'offset' => '0',
        'mkt' => 'en-us',
        'safesearch' => 'Moderate',
    );

    $url->setQueryVariables($parameters);

    $request->setMethod(HTTP_Request2::METHOD_GET);

    // Request body
    $request->setBody("{body}");

    try
    {
        $response = $request->send();
        echo $response->getBody();
    }
    catch (HttpException $ex)
    {
        echo $ex;
    }

    ?>
</body>
</html>
