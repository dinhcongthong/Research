<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QueueSearch extends Model
{
    use HasFactory;

    protected $table = 'queue_search';

    protected $fillable = [
        'keyword_id',
        'keyword_name',
        'table_no',
        'location',
        'address'
    ];
}
