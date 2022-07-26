<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable=['mark','model','color','car_num','id_client', 'status'];

    public function client(){
        return $this->belongsTo(Client::class,'id_client','id');
    }
}
