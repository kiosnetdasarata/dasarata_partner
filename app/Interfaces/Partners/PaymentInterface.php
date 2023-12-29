<?php

namespace App\Interfaces\Partners;

interface PaymentInterface
{
    function getToday();
    function getThisMonth();
    function getHistories();
    function countHistories();
    function find($id);
    function getHistoryCustomer($va);
    function getPaidRangeDate($startDate, $endDate);
}
