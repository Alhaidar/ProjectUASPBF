<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_user
 * @property int $id_lomba
 * @property string $no_telp
 * @property string $judul_proposal
 * @property string $abstrak
 * @property string $dosen_pembimbing
 * @property string $nomor_induk_dosen
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property User $user
 * @property Lomba $lomba
 * @property Anggotas[] $anggotas
 * @property Jadwal[] $jadwals
 * @property Pengumpulan[] $pengumpulans
 */
class Tim extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tim';

    /**
     * @var array
     */
    protected $fillable = ['id_user', 'id_lomba', 'no_telp', 'judul_proposal', 'abstrak', 'dosen_pembimbing', 'nomor_induk_dosen', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lomba()
    {
        return $this->belongsTo('App\Lomba', 'id_lomba');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function anggotas()
    {
        return $this->hasMany('App\Anggota', 'id_tim');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jadwals()
    {
        return $this->hasMany('App\Jadwal', 'id_tim');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengumpulans()
    {
        return $this->hasMany('App\Pengumpulan', 'id_tim');
    }
}
