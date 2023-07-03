<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\UserRequest;
use App\Http\Resources\PanelDataTable\UserResource;
use App\Model\Faq;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('panel.users.index');
    }

    public function create()
    {
        return view('panel.users.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        if ($request->hasFile('file')){
            $image = uploadImage($request , 'file');
            $data['avatar'] = $image->getOriginal('file_name');
        }

        User::create($data);
        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = User::findOrFail($id);
        return view('panel.users.create', $data);
    }

    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        $user = User::findOrFail($id);

        if (!$request->filled('password')) {
            $data['password'] = $user->password;
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        if ($request->hasFile('file')){
            $image = uploadImage($request , 'file');
            $data['avatar'] = $image->getOriginal('file_name');
        }

        $user->update($data);
        return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        return $user->delete() ? $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK) : $this->response_api(true, __('messages.error'), StatusCodes::INTERNAL_ERROR);
    }

    public function datatable(Request $request  )
    {
        $items = User::query()->filter($request);
        $resource= new UserResource($items);
        return filterDataTable($items ,$resource,$request);
    }


    public function operation(Request $request)
    {
        $item = User::find($request->id);
        if (isset($item)) {
            $item->is_active = !$item->is_active;
            $item->save();
            return $this->response_api(true, __('messages.done_successfully'), StatusCodes::OK);
        } else {
            return $this->response_api(false, __('messages.error'), StatusCodes::INTERNAL_ERROR);
        }

    }

}
