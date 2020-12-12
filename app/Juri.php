<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_user
 * @property int $id_lomba
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Lomba $lomba
 * @property User $user
 */
class Juri extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'juri';

    /**
     * @var array
     */
    protected $fillable = ['id_user', 'id_lomba', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lomba()
    {
        return $this->belongsTo('App\Lomba', 'id_lomba');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
