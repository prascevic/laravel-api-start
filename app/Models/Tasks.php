<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tasks extends Model
{
    //
    public $incrementing = false; // 👈 Important
    protected $keyType = 'string'; // UUIDs are string

    protected $fillable = [
        'id' => 'string',
        'title',
        'description',
        'status',
        'assigneeId',
        'created_at',
        'updated_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
