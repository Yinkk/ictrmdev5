<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'prefixname_th',
        'firstname_th',
        'lastname_th',
        'firstname_en',
        'lastname_en',
        'prefixname_en',
        'user_position',
        'user_education',
        'user_degree',
        'user_institution'
    ];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function roles(){
        return $this->belongsToMany("App\Models\Role");
    }

    public function faculty(){
        return $this->belongsTo("App\Models\Faculty");
    }

    public function major(){
        return $this->belongsTo("App\Models\Major");
    }

    public function userType(){
        //user_type
        return $this->belongsTo("App\Models\UserType","usertype_id");
    }

    public function syncRoles(array $roles){
        $ids = [];
        foreach($roles as $role){
            array_push($ids,$role['id']);
        }
        $this->roles()->sync($ids,true);
    }

}
