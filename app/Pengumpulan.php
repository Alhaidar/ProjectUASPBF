<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_tim
 * @property string $subjek
 * @property string $file
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Tim $tim
 */
class Pengumpulan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pengumpulan';

    /**
     * @var array
     */
    protected $fillable = ['id_tim', 'subjek', 'file', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tim()
    {
        return $this->belongsTo('App\Tim', 'id_tim');
    }
}
