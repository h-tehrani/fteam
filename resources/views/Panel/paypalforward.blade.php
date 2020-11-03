<?php
use PoolPort\PoolPort;

$poolPort = new PoolPort(PoolPort::P_MELLAT);
try {
    $refId = $poolPort->set(1000)->ready()->refId();

    // Your code here

    $poolPort->redirect();
} catch (Exception $e) {
    echo $e->getMessage();
}
/* its for forwarding requesto to paypal*/