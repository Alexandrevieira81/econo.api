<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Billing;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden =['id','senha','usuario'];
    

    public function Billings()
    {
        return $this->hasMany(Billing::class);
    }
}