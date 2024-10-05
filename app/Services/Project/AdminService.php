<?php

namespace App\Services\Project;
use App\Models\Project\Admin;
use App\Services\MainService;
use App\Enums\AdminTypeisEnum;
use Illuminate\Support\Facades\Auth;

class AdminService extends MainService
{
    public function __construct(Admin $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/admin/';
        $this->files = ['image'];
    }
    public function getAuthUser()
    {
        $user = Auth::guard('admin')->user();
        return $user;
    }
    // public function storeAdmin($data,$permissions)
    // {
    //     $data["admin_type"] = AdminTypeisEnum::GlobalManger->value ;
    //     $admin = $this->store($data);
    //     return $admin;
    // }

    // public function updateAdmin($id, $data,$permissions)
    // {
    //     return  $this->update($id,$data);
    // }

}
