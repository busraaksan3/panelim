<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguagesTranslates extends Model
{
    use HasFactory;

    protected $table = 'languages_translates';
    protected $appends = ["word_key"];

    public function translates(){
        return $this->hasOne("App\Models\LanguagesWords","id","word_id");
    }

    public function getWordKeyAttribute(){
        return $this->translates->word_key;
    }

}
