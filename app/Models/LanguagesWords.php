<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguagesWords extends Model
{
    use HasFactory;

    protected $table = 'languages_word';

    public function translates(){
        return $this->hasMany("App\Models\LanguagesTranslates","word_id","id");
    }

}
