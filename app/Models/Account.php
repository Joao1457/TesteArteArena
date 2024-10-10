<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';

    protected $fillable = ['titulo', 'descricao', 'valor', 'data_vencimento', 'status','user.id',];

    public function user(){
        return $this->belongsTo(User::class);
    }

}

