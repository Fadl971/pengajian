<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class peserta extends Model
{
    use HasFactory;
     protected $table = 'peserta';

     protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'email',
        'jenis_kelamin',
        'catatan',
        'token',
     ];
     public static function boot()

     {
      parent::boot();
      static::creating(function($peserta) {
         $peserta->token = Str::random(4);
      });
     }
}
