#!/usr/bin/php
<?php
/*
 Sergio Cayuqueo
 cayu@cayu.com.ar

Script para chequeo del Servicio de Factura Electronica de AFIP de Argentina

SimpleXMLElement Object
(
    [appserver] => OK
    [authserver] => OK
    [dbserver] => OK
)
*/
$xml_cae_dummy = simplexml_load_file('https://serviciosjava.afip.gob.ar/wsmtxca/services/MTXCAService/dummy');

$appserver_status	= $xml_cae_dummy->appserver;
$authserver_status	= $xml_cae_dummy->authserver;
$dbserver_status	= $xml_cae_dummy->dbserver;

if (($appserver_status == 'OK') && ($authserver_status == 'OK') && ($dbserver_status == 'OK')) {
    print("OK - [appserver] ".$appserver_status." [authserver] ".$authserver_status." [dbserver] ".$dbserver_status."|rc=0\n");
    exit(0);
} else {
    print("CRITICAL - [appserver] ".$appserver_status." [authserver] ".$authserver_status." [dbserver] ".$dbserver_status."|rc=2\n");
    exit(2);
}
?>
