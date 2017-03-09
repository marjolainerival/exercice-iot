**Exercice IOT**
================

Exercice utilisant l'API Bing de Microsoft.

Pré-requis
----------

Installation de l'outil permettant de se connecter à l'iot hub :
https://github.com/tomconte/azure-iot-hub-php

Installation de Pear :
https://pear.php.net/manual/en/installation.getting.php

-------

Configuration
-----

Configurer la connexion à l'iot hub
```
$host = 'Hostname'; //Copier le nom de votre host
$deviceId = 'DeviceName'; // Copier le nom de votre device
$deviceKey = 'DeviceKey'; // Copier la clé de votre device
```

Configurer votre souscription à Microsoft Cognitive Services :
```
$headers = array(
	// Request headers
    'Ocp-Apim-Subscription-Key' => 'YourSubscriptionKey', // Entrer votre clé
 );
```
