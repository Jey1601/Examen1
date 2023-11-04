<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    use HasFactory;

    public $timestamps = false; //NO existe el campo create_At and update At
    public $table = "directorio";

    public $primaryKey = 'codigoEntrada'; // le decimos que no estamos usando la función id como id, sino que tenemos un campo diferente como id
    public $incrementing = false;
}
