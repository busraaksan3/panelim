<?php

use App\Models\Languages;
use App\Models\LanguagesWords;
use App\Models\LanguagesTranslates;

// ÇEVİRİ İŞLEMLERİ FOKSİYONU
function _c($string,$main_language = "tr_TR"){

    if(session_status() != PHP_SESSION_ACTIVE){
        session_start();
    }

    if(@!$_SESSION['LANGUAGE']){
        $_SESSION['LANGUAGE'] = "tr_TR";
    }

    $findCurrentLanguage = Languages::where("code","=",$_SESSION['LANGUAGE'])->first();

    $findWord = LanguagesWords::where("word_key","=",trim($string))->first();
    if(!$findWord){

        $newWord = new LanguagesWords;
        $newWord->main_language = $main_language;
        $newWord->word_key = trim($string);
        $newWord->save();

        $newTranslate = new LanguagesTranslates;
        $newTranslate->language_id = $findCurrentLanguage->id;
        $newTranslate->word_id = $newWord->id;
        $newTranslate->word = $newWord->word_key;
        $newTranslate->save();

        foreach (getAllLanguages() as $lang){
            if($lang->id != $findCurrentLanguage->id){
                $findTranslate = LanguagesTranslates::where("language_id","=",$lang->id)->where("word_id","=",$newWord->id)->first();
                if(!$findTranslate){
                    $newTranslate = new LanguagesTranslates;
                    $newTranslate->language_id = $lang->id;
                    $newTranslate->word_id = $newWord->id;
                    $newTranslate->word = null;
                    $newTranslate->save();
                }
            }
        }

        $findWordLast = LanguagesWords::where("word_key","=",trim($string))->first();

        return $findWordLast->translates()->where("language_id","=",$findCurrentLanguage->id)->first()->word;

    }else{
        if($findWord->translates()->where("language_id","=",$findCurrentLanguage->id)->first()){
            return $findWord->translates()->where("language_id","=",$findCurrentLanguage->id)->first()->word;
        }else{
            $newTranslate = new LanguagesTranslates;
            $newTranslate->language_id = $findCurrentLanguage->id;
            $newTranslate->word_id = $findWord->id;
            $newTranslate->word = null;
            $newTranslate->save();
            return $newTranslate->word;
        }
    }

}
