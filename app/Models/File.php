<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File  extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'size',
        'path',
        'type',
        'created_at',
        'id_folder',
    ];

    
    public function folder()
    {
        return $this->belongsTo(Folder::class, 'id_folder', 'id');
    }
}
