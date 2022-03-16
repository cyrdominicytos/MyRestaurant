<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    //
    public function newRole(){
        return view('admin.updateRole');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255',],
            
        ]);
    }

    public function createRole(Request $request){
        
        $this->validator($request->all())->validate();
        $roles=new Role();
        $roles->role_name=$request['name'];
        $roles->role_description=$request['description'];
        $roles->role_slug=$request['slug'];
        $roles->save();
        $permi_role=DB::table('permission_role')->insert([
            "role_id"=>$roles->id,
            "permission_list"=>json_encode($request->permission)
        ]);
         return redirect()->route('newClient');
    }
}
