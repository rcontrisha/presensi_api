<?php
// app/Models/Pegawai.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pegawai extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    public $timestamps = true;
    protected $guard = 'sanctum';
    protected $table = 'pegawais'; 
    protected $fillable = ['nip', 'nama', 'email', 'password', 'device_id', 'created_at', 'updated_at'];
}
