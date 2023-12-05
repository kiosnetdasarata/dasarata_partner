<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\PartnerInterface;
use App\Models\Partner;

Class PartnerRepository implements PartnerInterface
{

    function __construct(private Partner $partner)
    {}

    function getAll()
    {
        return $this->partner->get();
    }

    function find($id)
    {
        return $this->partner->withCount('customers')->find($id);
    }

    function count()
    {
        return $this->partner->count();
    }

    function store($request)
    {
        return $this->partner->create($request);
    }

    function update($request, $id)
    {
        return $this->partner->where('id', $id)->update($request);
    }

}
