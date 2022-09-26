<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        'thread_title', 'client_id', 'status', 'assigned_to', 'created_by', 'updated_by', 'deleted_by'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 0;
            $model->updated_by = NULL;
            $model->deleted_by = NULL;
        });

        static::updating(function ($model) {
            $model->updated_by = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 0;
        });

        static::deleting(function ($model) {
            $model->deleted_by = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 0;
        });
    }

    /**
     * Get the messages that belong to the Thread.
     */
    public function messages()
    {
        return $this->hasMany(ThreadMessage::class, 'thread_id');
    }

    /**
     * Get the admin assigned to handle the Thread.
     */
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * Get the client who create the Thread.
     */
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
