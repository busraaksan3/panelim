<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLangRequest;
use App\Http\Requests\UpdateLangRequest;
use Illuminate\Http\Request;
use App\Models\Languages;

class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
