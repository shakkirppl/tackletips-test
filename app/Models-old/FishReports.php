<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class FishReports extends Model
{
    protected $table = 'fishing_reports';
    use HasFactory;
    protected $fillable = [
        'user_id', 'name', 'place', 'tacke_used', 'image', 'in_date', 'in_time', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
