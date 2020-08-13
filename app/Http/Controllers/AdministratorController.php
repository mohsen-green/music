<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maklad\Permission\Models\Permission;
use Maklad\Permission\Models\Role;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admininstrator = User::latest()->get();
        return view('admininstrator.index', compact('admininstrator'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admininstrator.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',
            'image' => 'required|image|max:2048',

        ]);

        $url = "5f25373f5b38800011667535.liara.space";
        $uuid = Str::uuid();
        $extension_file = $request->file('image')->extension();
        $request->file('image')->storeAs($url . '/' . 'images', $uuid . '.' . $extension_file, 's3');
        $url_cover_image = "/images/$uuid.$extension_file";

        $request->merge(['password' => bcrypt($request->password)]);
        $user = User::create($request->all() + ['images' => $url_cover_image]);
        $role = Role::find($request->role);
        $user->assignRole($role->name);
        $permission = Permission::find($role->permission_ids);
        $user->givePermissionTo($permission[0]->name);

        return redirect()->back()->with('message', 'با موفقیت‌‌‌‌ ذخیره شد ‌‌');

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

        $admininstrator = User::find($id);
        $roles = Role::all();
        return view('admininstrator.edit', compact('id', 'admininstrator', 'roles'));
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

        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,users.id',
            'password' => 'required',
            'role' => 'required',
            'image' => 'image|max:2048',
        ]);

        $user = User::find($id);
        // چک کردن رکوئست برای وجود عکس برای اپدیت یا ثبت عکس قبلی
        if ($request->image != null) {

            $url = "5f25373f5b38800011667535.liara.space";
            $uuid = Str::uuid();
            $extension_file = $request->file('image')->extension();
            $request->file('image')->storeAs($url . '/' . 'images', $uuid . '.' . $extension_file, 's3');
            $url_cover_image = "/images/$uuid.$extension_file";
        } else {
            $url_cover_image = '/' . $user->images;
        }
        $request->merge(['password' => bcrypt($request->password)]);
        $result = $user->update(['name' => $request->name, 'email' => $request->email,
            'password' => $request->password, 'images' => $url_cover_image,
        ]);
        //    دادن نقش به کاربر
        $role = Role::find($request->role);
        $user->syncRoles($role->name);
        $permission = Permission::find($role->permission_ids);
        $user->syncPermissions($permission[0]->name);

       return redirect()->back()->with('message', 'با موفقیت ویرایش شد‌‌');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
