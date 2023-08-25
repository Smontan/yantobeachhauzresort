<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebPage extends Model
{
    use HasFactory;

    protected $table = 'web_page';

    protected $fillable = [
        'name',
        'title',
        'sub_title',
        'description',
        'image',
        'status',
    ];
}
