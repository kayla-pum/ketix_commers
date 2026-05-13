<?php

namespace App\Models;

// Tambahkan import berikut
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;  // Pastikan HasFactory ada di sini
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // Method untuk cek apakah user adalah admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}