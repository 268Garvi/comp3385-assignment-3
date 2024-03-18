<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'telephone',
        'address',
        'company_logo'
    ];

}
