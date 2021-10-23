<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Task extends Model
{

    // use Sortable;

    // protected $table = "tasks";

    // protected $fillable = ["title", "description", "type_id"];

    // public $sortable = ["id", "title", "description", "type_id"];


    public function taskTypes() {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

}
