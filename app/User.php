<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Demande;
use App\Previlage;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user',
        'first_name',
        'last_name',
        'privilage',
        'agences_id',
        'etat',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function agence()
    {
        return $this->belongsTo('App\Agence','agences_id','id');
    }

    public function role()
    {
        return $this->belongsTo(Previlage::class,'privilage','id');
    }

    public static function getLastId()
    {
        // get all user with privilage 4
        $users = DB::table('users')->where('privilage',4)->get();

        // get last demande 
        $lastId = DB::table('demandes')->orderBy('id','DESC')->limit(1)->first();

        // store count of all users
        $count = count($users);

        // if the last demande id is not null 
        if($lastId->id != null){

            // loop all user to get the last user affected
            for($i = 0; $i < $count; $i++){

                if($lastId->affecter == $users[$i]->id){

                    if($i < $count - 1){
                        return $users[$i + 1]->id;
                    }else{
                        return $users[0]->id;
                    }

                }
            }
        }
        else{
           return $users[0]->id;
        }

    }

    public static function AllUserAble(){
        return DB::table('users')->where([
            ['etat','=','1'],
            ['privilage', '=', '4']
        ])->get();
    }

}
