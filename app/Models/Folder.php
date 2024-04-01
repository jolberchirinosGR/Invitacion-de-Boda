<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder  extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_folder',
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class, 'id_folder', 'id');
    }

    public function folders()
    {
        return $this->hasMany(Folder::class, 'id_folder');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'id_folder');
    }
}
