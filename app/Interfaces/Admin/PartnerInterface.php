<?php

namespace App\Interfaces\Admin;

interface PartnerInterface
{
    function getAll();
    function find($id);
    function count();
    function store($request);
    function storeUser($request);
    function update($request, $id);
    function updateUser($request, $id);
}
