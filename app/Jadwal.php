<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_tim
 * @property string $waktu_mulai
 * @property string $waktu_berakhir
 * @property boolean $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Tim $tim
 */
class Jadwal extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'jadwal';

    /**
     * @var array
     */
    protected $fillable = ['id_tim', 'waktu_mulai', 'waktu_berakhir', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tim()
    {
        return $this->belongsTo('App\Tim', 'id_tim');
    }
}
