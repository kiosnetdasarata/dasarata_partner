<?php

namespace App\Interfaces\Partners;

interface CustomerInterface
{
    function getAll();
    function store($request);
    function storeBill($request);
    function find($id);
}
