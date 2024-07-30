<?php

declare(strict_types=1);

namespace App\Models;

use Cake\Chronos\Chronos;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

    // fields that can be updated in tinker
    protected $fillable = ['name', 'completed'];
}
