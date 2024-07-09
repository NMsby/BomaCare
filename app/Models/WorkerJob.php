<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkerJob extends Model
{
    protected $fillable = ['worker_id', 'title', 'description', 'document_path'];

    protected $table = "worker_jobs";

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}