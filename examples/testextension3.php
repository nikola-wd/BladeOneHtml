<?php /** @noinspection DuplicatedCode */
/**
 * Copyright (c) 2016 Jorge Patricio Castro Castillo MIT License.
 */
include "../vendor/autoload.php";

use eftec\bladeone\BladeOne;
use eftec\bladeonehtml\BladeOneHtml;

$views = __DIR__ . '/views';
$compiledFolder = __DIR__ . '/compiled';

class myBlade extends BladeOne
{
    use BladeOneHtml;
}

$blade = new myBlade($views, $compiledFolder);
$blade->setMode(BladeOne::MODE_DEBUG);
$blade->customAttr['customtag'] = 'XXXXX';

$blade->pattern['alert'] = '{{pre}}<div {{inner}}><h1>{{customtag}}</h1>{{between}}</div>{{post}}';

//<editor-fold desc="Example data">
$countries = array();
$country = new stdClass();
$country->id = 1;
$country->cod = 'ar';
$country->name = "Argentina";
$country->continent = "America";
$countries[] = $country;
$country = new stdClass();
$country->id = 2;
$country->cod = 'ca';
$country->name = "Canada";
$country->continent = "America";
$countries[] = $country;
$country = new stdClass();
$country->id = 3;
$country->cod = 'us';
$country->name = "United States";
$country->continent = "America";
$countries[] = $country;
$country = new stdClass();
$country->id = 4;
$country->cod = 'jp';
$country->name = "Japan";
$country->continent = "Asia";
$countries[] = $country;
$country = new stdClass();
$country->id = 5;
$country->cod = 'ko';
$country->name = "Korea";
$country->continent = "Asia";
$countries[] = $country;

$countrySelected = 3;
$multipleSelect = [1, 2];

function mifunction($country)
{
    if ($country->cod === 'us') {
        return 'background-color:orange';
    } else {
        return 'background-color:green';
    }
}


//</editor-fold>
try {
    echo $blade->run("TestExtension.helloextensions3"
        , [
            'somevar' => 'somevar123'
            , 'true' => 1
            , 'false' => ''
            , 'countries' => $countries
            , 'selection' => 3
            , 'countrySelected' => $countrySelected
            , 'multipleSelect' => $multipleSelect
            ]);
} catch (Exception $e) {
    echo "error found " . $e->getMessage() . "<br>" . $e->getTraceAsString();
}
