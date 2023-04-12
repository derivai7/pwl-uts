<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokterModel extends Model
{
    use HasFactory;

    protected $table = 'dokter';
    protected $fillable = [
        'nama',
        'spesialis',
        'pengalaman',
        'alamat',
        'nomor_telepon'
    ];

    public function scopeFilter(Builder $query, $keyword)
    {
        $query->when($keyword ?? false, function (Builder $query, $keyword) {
            return $query->where('nama', 'like', '%' . $keyword . '%')
                ->orWhere('spesialis', 'like', '%' . $keyword . '%')
                ->orWhere('pengalaman', 'like', '%' . $keyword . '%')
                ->orWhere('alamat', 'like', '%' . $keyword . '%')
                ->orWhere('nomor_telepon', 'like', '%' . $keyword . '%');
        });
    }
}
