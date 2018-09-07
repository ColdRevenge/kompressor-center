<?php

interface IPayment {
    function getPaymentMethods();
    function getPaymentMethodId($method_id);
    function getPassword();
}