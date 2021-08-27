<?php

namespace App\Modules\Softnio\Models\Document;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentFile extends Model
{
    protected $fillable = ['document_id', 'path'];
}
