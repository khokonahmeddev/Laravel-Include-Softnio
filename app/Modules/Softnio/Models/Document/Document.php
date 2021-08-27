<?php

namespace App\Modules\Softnio\Models\Document;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['user_id', 'type'];

    public function documentFiles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DocumentFile::class, 'document_id', 'id');
    }
}
