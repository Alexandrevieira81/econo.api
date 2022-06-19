<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Billing extends Model
{
    use HasFactory;
    protected $hidden =['client_id'];

    public function Clients(){

         //Com belongsTo precisar realizar essa modificação para ele buscar o usário relacionado
         return $this->belongsTo('App\Models\Client','client_id'); 


       /*  Aqui solução da aula, não funcionou, perguntar para o professor
        return $this->belongsTo(Client::class); */
    }
}