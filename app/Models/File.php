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
        'updated_by',
        'id_folder',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function folder()
    {
        return $this->belongsTo(Folder::class, 'id_folder', 'id');
    }
}
