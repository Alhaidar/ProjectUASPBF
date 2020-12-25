<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * @property int $id
 * @property string $nama
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Juri[] $juris
 * @property Tim[] $tims
 */
class User extends Authenticatable
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'user';

    /**
     * @var array
     */
    protected $fillable = ['nama', 'email', 'password', 'role', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function juris()
    {
        return $this->hasMany('App\Juri', 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tims()
    {
        return $this->hasMany('App\Tim', 'id_user');
    }
}
