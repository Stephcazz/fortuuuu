<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = [
        'pin',
        'identifier',
        'password',
        'name',
        'iban',
        'bic',
        'address',
        'administrative_name',
        'administrative_phone',
        'operation_total',
        'apport_total',
        'financing_total',
        'operation_active',
        'apport_active',
        'financing_active',
        'document',
    ];
}
