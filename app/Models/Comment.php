<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChildParent;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'child_parent_id',
        'post_id'
    ];

    public function child_parent()
    {
        return $this->belongsTo(ChildParent::class);
    }
}
