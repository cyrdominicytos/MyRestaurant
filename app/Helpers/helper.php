<?php

use App\Models\Role;
use App\Models\MenuDay;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

if(!function_exists('getPermissionById')){
    function getPermissionById($id){
       $modelPermission=new Permission();
       $result=$modelPermission->where('permission_id',$id)->first();
       return $result;
    }
    
}

if(!function_exists('rolePermission')){
    function rolePermission($id){
        $permi_role=DB::table('permission_role')->where('role_id',$id)->first();
        $permission=json_decode($permi_role->permission_list);
        return $permission;
    }
}

// if(!function_exists('permissionEdit')){
//     function permissionEdit($arry){
//         $index="";$temp=[];$perm_edit=[];
//        foreach($arry as $per){
//           if($index==getPermissionById($per)->permission_module || $index==''){
//              $index=getPermissionById($per)->permission_module;
//              $temp[count($temp)]=$per;
//           }else{
//             $perm_edit[$index]=$temp;
//             $temp=[];
//             $index=getPermissionById($per)->permission_module;
//             $temp[count($temp)]=$per;
//           }
//        }
//        $perm_edit[$index]=$temp;
//        return $perm_edit;
//     }
// }

if(!function_exists('permissionModule')){
    
    function permissionModule(){
          $temp=[]; $perm=[]; $index="";
          $permissions=Permission::all();
          foreach($permissions as $permission){
            if($index==$permission->permission_module || $index=="")
            {
                 $index=$permission->permission_module;
                 $temp[count($temp)]=$permission;
                 
            }else{
                $perm[$index]=$temp;
                $temp=[];
                $index=$permission->permission_module;
                $temp[count($temp)]=$permission;
                
            }
          }
          $perm[$index]=$temp;
          return $perm; 
    }

}

if(!function_exists('menuFoodAll')){
    function menuFoodAll(){
        $listmenufood= MenuDay::orderBy('type_days')
                ->orderBy('type_met')
                ->orderBy('met_menu_days_id')
                 ->get();   
         $jour=0;$entre=[]; $index=0;$result=[];$type=0;

         foreach ($listmenufood as $key => $menufood){
            if($menufood->type_days.$menufood->type_met==$index || $index==0){
                $entre[count($entre)]=$menufood;
                $index=$menufood->type_days.$menufood->type_met;
                $type=$menufood->type_met;
                $jour=$menufood->type_days;
            }else{
                $result[$jour][$type]=$entre;
                $entre=[];
                $entre[count($entre)]=$menufood;
                $index=$menufood->type_days.$menufood->type_met;
                $type=$menufood->type_met;
                $jour=$menufood->type_days;
            }
         }
         $result[$jour][$type]=$entre;
         return $result;
    }
}

if(!function_exists('metType')){
    function metType($met_type=null){
        $type=array("1"=>"Entrées", "2"=>" Plat de Resistance", "3"=>"Deserts");
        if ($met_type!==null) {
            return $type[$met_type];
        }
        return $type;
    }
}

if(!function_exists('metJour')){
    function metJour($metjour=null){
        $jour=array("1"=>"Lundi", "2"=>"Mardi", "3"=>"Mercredi","4"=>"Jeudi","5"=>"Vendredi","6"=>"Samedi","7"=>"Dimanche");
        if ($metjour!==null) {
            return $jour[$metjour];
        }
        return $jour;
    }
}

if(!function_exists('status')){
    function status($met_status=null){
        $status=array("1"=>"En Stock", "2"=>"Pas en Stock");
        if ($met_status!==null) {
            return $status[$met_status];
        }
        return $status;
    }
}
