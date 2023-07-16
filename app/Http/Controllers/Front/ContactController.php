<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactRequest;
use App\Model\Contact;

class ContactController extends Controller
{

    public function store(ContactRequest $request)
    {
        Contact::query()->create($request->all());
        return $this->response_api(true , __('messages.success_contact') );
    }

}
