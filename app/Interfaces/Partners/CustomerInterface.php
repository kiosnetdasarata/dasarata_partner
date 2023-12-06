<?php

namespace App\Interfaces\Partners;

interface CustomerInterface
{
    function getUnpaid();
    function getActive();
    function store($request);
    function update($request, $id);
    function storeBill($request);
    function find($id);
    function checkId($id);
}
