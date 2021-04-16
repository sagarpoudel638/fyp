<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookDetails extends Model
{
    protected $fillable = ['BookName','Author','Publication','StockQuantity','Price','user_id'];
}
