<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;
    protected $guard = 'sanctum';
    protected $table = 'presence_data';
    protected $fillable = ['nip', 'latitude', 'longitude', 'waktu', 'device_id'];
    public $timestamps = false;
}
