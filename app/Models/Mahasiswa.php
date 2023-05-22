<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas'; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswas
    protected $primaryKey = 'nim'; // Memanggil isi DB dengan Primary Key
    public $incrementing = false;

    protected $fillable = [
        'nim',
        'nama',
        'kelas_id',
        'jurusan',
        'no_hp',
    ];
}
