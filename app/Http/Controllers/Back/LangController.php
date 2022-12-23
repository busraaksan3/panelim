<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLangRequest;
use App\Http\Requests\UpdateLangRequest;
use Illuminate\Http\Request;
use App\Models\Languages;
use App\Models\LanguagesWords;
use App\Models\LanguagesTranslates;
use App\Models\User;


class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function get_ceviri(Request $request){

        $find = LanguagesWords::find($request->id);
        return $find->translates()->get()->toJson();

    }

    function ajax_get_ceviriler(){

        $getAll = \App\Models\LanguagesWords::get();
        $getAllLanguages = \App\Models\Languages::get();

        foreach ($getAll as $k => $a){
            foreach ($getAllLanguages as $lang){
                $translates = $a->translates()->where("language_id","=",$lang->id)->first();
                $column_name = $lang->code;
                $getAll[$k]->$column_name = $translates->word;
            }
        }

        $array = array();
        $array["data"] = $getAll;
        return json_encode($array);

    }

    function save_ceviri(Request $request){

        $find = LanguagesWords::find($request->ceviri_id);
        foreach ($find->translates()->get() as $get){
            $findTranslate = LanguagesTranslates::find($get->id);
            $str = "lang_".$findTranslate->language_id;
            $findTranslate->word = $request->$str;
            $findTranslate->save();
        }
        return "ok";

    }

    function translates(){
      
        return view("back.language.translate.index");
    }

    function switch_language($code){

        $findLanguage = Languages::where("code","=",$code)->first();
        if($findLanguage){

            if(session_status() != PHP_SESSION_ACTIVE){
                session_start();
            }

            if(@$_SESSION['CURRENT_USER']){
                $getUser = User::find(getCurrentUser()->id);
                $getUser->dil = $findLanguage->code;
                $getUser->save();

                $_SESSION['CURRENT_USER'] = $getUser;
                $_SESSION['LANGUAGE'] = $findLanguage->code;
            }else{
                $_SESSION['LANGUAGE'] = $findLanguage->code;
            }

            return redirect()->back();

        }else{
            return redirect()->back();
        }

    }

    public function index()
    {
        $data['lang'] = Languages::all();
        return view('back.language.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLangRequest $request)
    {
        if ($request->hasFile('flag')) {
            $file_name = uniqid() . '.' . $request->flag->getClientOriginalExtension();
            $request->flag->move(public_path('images/flag'), $file_name);
        } else {
            $file_name = null;
        }
        $lang = Languages::insert(
            [
                "name" => $request->name,
                "code" => $request->code,
                "flag" => $file_name,

            ]
        );
        if ($lang) {
            return redirect(route('language.index'));
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lang = Languages::where('id', $id)->first();
        return view('back.language.edit')->with('languages', $lang);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLangRequest $request, $id)
    {
        $lang = Languages::find($id);
        $lang->name = $request->name;
        $lang->code = $request->code;
        
        if ($request->hasFile('flag')) {

            $file_name = uniqid() . '.' . $request->flag->getClientOriginalExtension();
            $request->flag->move(public_path('images/flag'), $file_name);


            $path = 'images/flag/' . $request->old_file;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }

            $lang->flag = $file_name;
        }
        
        $lang->save();

            if ($lang) {
                return back();
            }
           
        }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lang = Languages::find($id);

        $lang->delete();
        return redirect()->route('language.index');
    }
}
