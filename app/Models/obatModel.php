<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatModel extends Model
{
    use HasFactory;

    protected $table = 'obat';
    protected $fillable = [
        'nama_obat',
        'jenis',
        'dosis',
        'harga'
    ];

    public function scopeFilter(Builder $query, $keyword)
    {
        $query->when($keyword ?? false, function (Builder $query, $keyword) {
            return $query->where('nama_obat', 'like', '%' . $keyword . '%')
                ->orWhere('jenis', 'like', '%' . $keyword . '%')
                ->orWhere('dosis', 'like', '%' . $keyword . '%')
                ->orWhere('harga', 'like', '%' . $keyword . '%');
        });
    }
}
