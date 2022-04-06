<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Role;
use App\Models\Permission;
use Cache;

class User extends Authenticatable
{
    use Notifiable;

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active', 'company_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasPermission(Permission $permission)
    {
        return $this->hasAnyRoles($permission->roles);
    }
    
    public function hasAnyRoles($roles)
    {
        if(is_array($roles) || is_object($roles) ) {
            return !! $roles->intersect($this->roles)->count();
        }
        
        return $this->roles->contains('name', $roles);
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function getPermission($permiso_name)
    {
        $roles = $this->roles()->first();
        $permissions = Permission::join('permission_role', 'permission_role.id', 'permissions.id')->where('name', $permiso_name)->where('role_id',$roles->id)->dd();
        //dd($permissions);
        return true;
    }

    static function user_registrados($id_company, $role_id){
        $users_num = $user_rol_auth = User::join('role_user', 'users.id', 'role_user.user_id')->where('company_id', $id_company)->where('role_id', $role_id)->count();
        return $users_num;
    }

}