<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\PartnerInterface;
use App\Models\Partner;
use App\Models\User;
use App\Models\VaCustomer;

Class PartnerRepository implements PartnerInterface
{

    function __construct(private Partner $partner,
                        private User $user)
    {}

    function getAll()
    {
        return $this->partner->get();
    }

    function find($id)
    {
        return $this->partner->withCount('customers')->find($id);
    }

    function findByPartnerId($partner_id)
    {
        return $this->partner->where('partner_id',$partner_id)->first();
    }

    function count()
    {
        return $this->partner->count();
    }

    function store($request)
    {
        return $this->partner->create($request);
    }

    function storeUser($request)
    {
        return $this->user->create($request);
    }

    function update($request, $id)
    {
        return $this->partner->where('partner_id', $id)->update($request);
    }

    function updateUser($request, $id)
    {
        return $this->user->where('partner_id', $id)->update($request);
    }

}
