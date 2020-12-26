<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_tim
 * @property int $id_fakultas
 * @property string $nama
 * @property string $nim
 * @property string $nomor
 * @property string $email
 * @property string $alamat
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Fakultas $fakulta
 * @property Tim $tim
 */
class Anggota extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anggota';

    /**
     * @var array
     */
    protected $fillable = ['id_tim', 'id_fakultas', 'nama', 'nim', 'no_telp', 'email', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fakultas()
    {
        return $this->belongsTo('App\Fakultas', 'id_fakultas');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tim()
    {
        return $this->belongsTo('App\Tim', 'id_tim');
    }
}
