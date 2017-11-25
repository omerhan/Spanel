<?php

namespace Omerhan\Spanel\Http\Controllers;

use Omerhan\Spanel\Models\Lang;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class LangsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $langs = Lang::orderBy('order','ASC')->get();
        return view('spanel::langs.index',compact('langs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $klasoryolu = ''.base_path().'/resources/lang/'.$request->kisaltma.'';

        if (!File::exists($klasoryolu)){
            File::makeDirectory($klasoryolu,0777,true,true);
        }else{
            return Redirect::to('spanel/langs')->with(array('message'=>'true','title'=>'Başarısız','text'=>'Dil dosyaları zaten var.','type'=>'error','script'=>'sweet'));
        }
        $dest = base_path().'/resources/lang/tr/';
        $files = scandir(base_path().'/resources/lang/tr');
        foreach($files as $file){
            if($file!='.' && $file!='..'){
                $copy = copy($dest.$file , $klasoryolu.'/'.$file);
            }
        }
        if($copy) {
            if ($request->hasFile('bayrak')) {
                $file = $request->file('bayrak');
                $mime = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName();
                $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
                $filename = str::slug($request->kisaltma);
                $filename = "/" . $filename . '.' . $mime;
                $path = "_uploads/photos/lang";
                $file->move($path, $filename);
                $filename = $path . '' . $filename;
                $img = Image::make($filename);
                $img->resize(23, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save($filename);
                $array = array_except($request->except('_token'), ['bayrak']);
                $array = array_add($array, 'bayrak', $filename);
            } else {
                $array = array_except($request->except('_token'), ['bayrak']);
            }
        }
        Lang::Create($array);
        return Redirect::to('spanel/langs')->with(array('message'=>'true','title'=>'Başarılı','text'=>'Dil başarıyla oluşturuldu.','type'=>'success','script'=>'sweet'));
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
        $lang = Lang::findOrFail($id);
        return view('spanel::langs.edit',compact('lang'));
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
        $lang = Lang::findOrFail($id);
        $array = array_except($request->except('_token'), ['bayrak']);

        if ($request->hasFile('bayrak'))
        {
            $sil = public_path($lang->bayrak);
            File::delete($sil);
            $file = $request->file('bayrak');
            $mime = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $filename = preg_replace('/\\.[^.\\s]{3,4}$/','',$filename);
            $filename = str::slug($request->kisaltma);
            $filename = "/".$filename.'.'.$mime;
            $path = "_uploads/photos/lang";
            $file->move($path,$filename);
            $filename = $path .''.$filename;
            $img = Image::make($filename);
            $img->resize(23, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save($filename);
            $array = array_add($array,'bayrak', $filename);
        }

        if($request->kisaltma != $lang->kisaltma){
            $klasoryolu = ''.base_path().'/resources/lang/'.$request->kisaltma.'';
            if (!File::exists($klasoryolu)){
                File::makeDirectory($klasoryolu,0777,true,true);
            }
            $dest = base_path().'/resources/lang/'.$lang->kisaltma.'/';
            $files = scandir(base_path().'/resources/lang/'.$lang->kisaltma.'');
            foreach($files as $file){
                if($file!='.' && $file!='..'){
                    $copy = copy($dest.$file , $klasoryolu.'/'.$file);
                }
            }
            File::deleteDirectory(''.base_path().'/resources/lang/'.$lang->kisaltma.'');
        }

        Lang::updateOrCreate(['id' => $id],$array);
        return Redirect::to('spanel/langs')->with(array('message'=>'true','title'=>'Başarılı','text'=>'Dil başarıyla güncellendi.','type'=>'success','script'=>'sweet'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lang = Lang::findOrFail($id);
        $file = public_path($lang->bayrak);
        File::delete($file);
        File::deleteDirectory(''.base_path().'/resources/lang/'.$lang->kisaltma.'');
        Lang::destroy($id);
    }

    public function postactive(Request $request, $id, $deger)
    {
        $lang = Lang::findOrFail($id);
        if($deger == 'false'){
            $active = 0;
            $activemsg = 'pasifleştirildi.';
            $type = 'error';
        }
        if($deger == 'true'){
            $active = 1;
            $activemsg = 'aktifleştirildi.';
            $type = 'success';
        }
        Lang::updateOrCreate(['id' => $id],array(
            'active' => $active
        ));
        return response()->json(['message' => $activemsg,'type' => $type]);
    }


    public  function setlocale(Request $request, $kisaltma){
        Session::put('locale',$kisaltma);
        return redirect('spanel');
    }

    public  function gettrans($id){
        $lang = Lang::findOrFail($id);
        $dosya = File::getRequire(base_path().'/resources/lang/'.$lang->kisaltma.'/shift.php');
        return view('spanel::langs.trans',compact('dosya','lang'));
    }

    public  function posttrans(Request $request,$id){
        $lang = Lang::findOrFail($id);
        $form = "<?php \n";
        $form .="return array( \n";
        $post = array_except($request->except('_token'), ['_method']);
        foreach($post as $key => $val){
            if($key !='_token'){
                $form.="'".$key."' => '".strip_tags($val)."', "." \n";
            }
        }//foreach sonu
        $form .="); \n";
        $dosya = base_path().'/resources/lang/'.$lang->kisaltma.'/shift.php';
        $fp = fopen($dosya, "w+");
        fwrite($fp,$form);
        fclose($fp);
        return Redirect::to('spanel/langs')->with(array('message'=>'true','title'=>'Başarılı','text'=>'Dil dönüşüm başarıyla güncellendi.','type'=>'success','script'=>'sweet'));
    }

}
