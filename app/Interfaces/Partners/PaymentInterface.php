<?php

namespace App\Interfaces\Partners;

interface PaymentInterface
{
    function getToday();
    function getHistories();
}
