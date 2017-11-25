<?php

namespace Omerhan\Spanel\Http\Controllers;
use Omerhan\Spanel\Models\Role;
use Omerhan\Spanel\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id','>=',Auth::user()->role_id)->get();
        $roles = Role::where('id','>=',Auth::user()->role_id)->get();
        return view('spanel::users.index',compact('users','roles'));
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
        if ($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $mime = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $filename = preg_replace('/\\.[^.\\s]{3,4}$/','',$filename);
            $filename = str::slug($request->name);
            $filename = "/".$filename.'__'.time().'.'.$mime;
            $path = "_uploads/photos/avatar";
            $file->move($path,$filename);
            $filename = $path .''.$filename;
            $img = Image::make($filename);
            $img->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save($filename);
            $array = array_except($request->except('_token'), ['avatar']);
            $array = array_add($array,'avatar', $filename);
        }else{
            $array = array_except($request->except('_token'), ['avatar']);
        }
        $sifre =bcrypt($request->password);
        $array = array_except($array, ['password']);
        $array = array_except($array, ['password_again']);
        $array = array_add($array,'password', $sifre);

        User::Create($array);
        return Redirect::to('spanel/users')->with(array('message'=>'true','title'=>'Başarılı','text'=>'Kullanıcı başarıyla oluşturuldu.','type'=>'success','script'=>'sweet'));
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
        $user = User::findOrFail($id);
        $roles = Role::where('id','>=',Auth::user()->role_id)->get();
        return view('spanel::users.edit', compact('user','roles'));

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
        $user = User::findOrFail($id);
        if($request->password!=''){
            $sifre =bcrypt($request->password);
        }else{
            $sifre = $user->password;
        }
        if ($request->hasFile('avatar'))
        {
            $sil = public_path($user->avatar);
            File::delete($sil);
            $file = $request->file('avatar');
            $mime = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $filename = preg_replace('/\\.[^.\\s]{3,4}$/','',$filename);
            $filename = str::slug($request->name);
            $filename = "/".$filename.'__'.time().'.'.$mime;
            $path = "_uploads/photos/avatar";
            $file->move($path,$filename);
            $filename = $path .''.$filename;
            $img = Image::make($filename);
            $img->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save($filename);
            $array = array_except($request->except('_token'), ['avatar']);
            $array = array_add($array,'avatar', $filename);
        }else{
            $array = array_except($request->except('_token'), ['avatar']);
        }
        $array = array_except($array, ['password']);
        $array = array_except($array, ['password_again']);
        $array = array_add($array,'password', $sifre);
        User::updateOrCreate(['id' => $id],$array);
        return Redirect::to('spanel/users')->with(array('message'=>'true','title'=>'Başarılı','text'=>'Kullanıcı başarıyla güncellendi.','type'=>'success','script'=>'sweet'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy ($id);
        //Dosya silme işlemlerini yap
    }

    public function profile()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('spanel::users.profile',compact('user'));
    }

    public function postprofile(Request $request){
        $user = User::findOrFail(Auth::user()->id);
        if (Hash::check($request->password,$user->password) && $request->password != ''){
            $array = array_except($request->except('_token'), ['password']);
            $sifre =bcrypt($request->password);
            $array = array_add($array,'password',$sifre);
            //resim işlemleri
            if ($request->hasFile('avatar'))
            {
                $sil = public_path($user->avatar);
                File::delete($sil);
                $file = $request->file('avatar');
                $mime = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName();
                $filename = preg_replace('/\\.[^.\\s]{3,4}$/','',$filename);
                $filename = str::slug($request->name);
                $filename = "/".$filename.'__'.time().'.'.$mime;
                $path = "_uploads/photos/avatar";
                $file->move($path,$filename);
                $filename = $path .''.$filename;
                $img = Image::make($filename);
                $img->resize(250, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save($filename);
                $array = array_except($array, ['avatar']);
                $array = array_add($array,'avatar',$filename);
            }
            //resim işlemleri
            User::updateOrCreate(['id' => Auth::user()->id],$array);
            return Redirect::to('spanel')->with(array('message'=>'true','title'=>'Başarılı','text'=>'Profil başarıyla güncellendi.','type'=>'success','script'=>'sweet'));
        }else{
            return Redirect::back()->with(array('message'=>'true','title'=>'Profil Güncellenemedi','text'=>'Parola Uyuşmuyor.','type'=>'error','script'=>'sweet'));
        }
    }

    public function password()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('spanel::users.password',compact('user'));
    }

    public function postpassword(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        if (Hash::check($request->old_password,$user->password) && $request->password != '' && $request->password == $request->password_again){
            $array = array_except($request->except('_token'), ['password_again']);
            $array = array_except($request->except('_token'), ['old_password']);
            $array = array_except($request->except('_token'), ['password']);
            $sifre =bcrypt($request->password);
            $array = array_add($array,'password',$sifre);
            User::updateOrCreate(['id' => Auth::user()->id],$array);
            return Redirect::to('spanel')->with(array('message'=>'true','title'=>'Başarılı','text'=>'Parola başarıyla güncellendi.','type'=>'info','script'=>'sweet'));
        }else{
            return Redirect::back()->with(array('message'=>'true','title'=>'Başarısız','text'=>'Parola Güncellenemedi.','type'=>'error','script'=>'sweet'));
        }
    }

    public function postactive(Request $request, $id, $deger)
    {
        $user = User::findOrFail($id);
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
        User::updateOrCreate(['id' => $id],array(
            'active' => $active
        ));
        return response()->json(['message' => $activemsg,'type' => $type]);
    }

}
