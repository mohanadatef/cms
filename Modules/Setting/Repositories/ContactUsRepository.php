<?php

namespace Modules\Setting\Repositories;

use Modules\Setting\Interfaces\ContactUsInterface;
use Modules\Setting\Entities\Contact_Us;
use Modules\Setting\Http\Requests\admin\Contact_us\Contact_UsCreateRequest;
use Modules\Setting\Http\Requests\admin\Contact_us\Contact_UsEditRequest;


class ContactUsRepository implements ContactUsInterface
{

    protected $contact_us;

    public function __construct(Contact_Us $contact_us)
    {
        $this->contact_us = $contact_us;
    }

    public function Get_All_Data()
    {
        return $this->contact_us->all();
    }

    public function Create_Data(Contact_UsCreateRequest $request)
    {
        $this->contact_us->create($request->all());
    }

    public function Get_One_Data($slug)
    {
        return $this->contact_us->where('slug',$slug)->first();
    }

    public function Update_Data(Contact_UsEditRequest $request, $slug)
    {
        $contact_us = $this->Get_One_Data($slug);
            $contact_us->update($request->all());
    }
}
