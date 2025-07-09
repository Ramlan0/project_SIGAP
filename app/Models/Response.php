<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = [
    'report_id',
    'user_id',
    'tanggapan',
    'tanggal_laporan'
];
        public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class); // Petugas
    }
}
