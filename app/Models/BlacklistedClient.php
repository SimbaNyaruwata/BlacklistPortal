<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlacklistedClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_name',
        'client_type',
        'institution',
        'account_manager',
        'date_blacklisted',
    ];
}
