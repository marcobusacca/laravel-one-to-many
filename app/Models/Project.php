<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Type;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['type_id', 'title', 'description', 'date_of_creation', 'cover_image'];

    public function type(){
        return $this->belongsTo(Type::class);
    }
}
