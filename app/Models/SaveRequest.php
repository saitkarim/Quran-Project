<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveRequest extends Model
{
    protected $table = 'requests';
    protected $fillable = ['email', 'subject', 'description', 'file'];
}
