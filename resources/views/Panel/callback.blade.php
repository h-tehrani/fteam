@extends('Layouts.master')
@section('content')
@endsection
<?php
use PoolPort\PoolPort;

try {
    $poolPort = new PoolPort;
    $trackingCode = $poolPort->verify()->trackingCode();
    $refId = $poolPort->refId();
    $cardNumber = $poolPort->cardNumber();

    // Your code here

} catch (Exception $e) {
    echo $e->getMessage();
}
/* its for callback payment*/

