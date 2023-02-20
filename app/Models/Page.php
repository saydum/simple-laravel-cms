<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    use HasFactory;

    protected $table = "pages";

    protected $fillable = [
        'model_name',
        'controller',
        'table',
        'slug',
        'module_id'
    ];

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}
