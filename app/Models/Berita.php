<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table="tblberita";

    protected $fillable = ["user_id","kategori_id","judul","gambar","isi","gambar"];

    /**
     * Get the user that owns the Berita
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    // SELECT KOMENTAR.*
    // FROM BERITA
    // INNER JOIN KOMENTAR ON BERITA.ID=KOMENTAR.BERITA_ID
    public function komentar(){
        return $this->hasMany(Komentar::class,'berita_id','id')->latest();
    }
}
