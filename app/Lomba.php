<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nama
 * @property string $batas_waktu
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Juri[] $juris
 * @property Tim[] $tims
 */
class Lomba extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'lomba';

    /**
     * @var array
     */
    protected $fillable = ['nama', 'batas_waktu', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function juris()
    {
        return $this->hasMany('App\Juri', 'id_lomba');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tims()
    {
        return $this->hasMany('App\Tim', 'id_lomba');
    }
}
