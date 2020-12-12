<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $judul
 * @property string $konten
 * @property string $tumbnail
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Pengumuman extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pengumuman';

    /**
     * @var array
     */
    protected $fillable = ['judul', 'konten', 'tumbnail', 'created_at', 'updated_at', 'deleted_at'];

}
