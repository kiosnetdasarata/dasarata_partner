<?php

namespace App\Interfaces\Partners;

interface CustomerInterface
{
    function getUnpaid();
    function getActive();
    function store($request);
    function update($request, $id);
    function storeBill($request);
    function updateBill($request, $id);
    function find($id);
    function checkId($id);

    //dashboard
    function countUnpaid();
    function countPaidToday();
    function countCustomerActive();
    function countCustomerIsolir();
    function chart();
}
