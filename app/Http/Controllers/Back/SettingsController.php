<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['manageSettings'] = Settings::all();
        return view('back.settings.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $settings = Settings::where('id', $id)->first();
        return view('back.settings.edit')->with('settings', $settings);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('settings_value')) {
            $request->validate([
                'settings_value' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid() . '.' . $request->settings_value->getClientOriginalExtension();
            $request->settings_value->move(public_path('images/settings'), $file_name);
            $request->settings_value = $file_name;
        }



        $settings = Settings::Where('id', $id)->update(
            [
                "settings_value" => $request->settings_value
            ]
        );

        if ($settings) {
            $path = 'images/settings/' . $request->old_file;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }

            return back()->with("success", "Düzenleme İşlemi Başarılı");
        }
        return back()->with("error", "Düzenleme İşlemi Başarısız");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $settings = Settings::find($id);

        $settings->delete();
        return redirect()->route('settings.index');
    }
}
