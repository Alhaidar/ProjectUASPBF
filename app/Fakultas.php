<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nama
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Anggotum[] $anggotas
 */
class Fakultas extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['nama', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function anggotas()
    {
        return $this->hasMany('App\Anggotum', 'id_fakultas');
    }
}
