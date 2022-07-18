<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use  Intervention\Image\Facades\Image;

class UserController extends Controller
{
    private $models = ['users', 'categories','products','sizes' , 'invoices'];
    private $actions = ['create', 'read', 'update', 'delete'];

    public function __construct()
    {
        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only(['create', 'store']);
        $this->middleware(['permission:update_users'])->only(['update', 'edit']);
        $this->middleware(['permission:delete_users'])->only('destroy');
    }


    public function index()
    {
        return view('dashboard.users.index_users');
    }


    public function create()
    {

        return view('dashboard.users.create_user', ['models' => $this->models, 'actions' => $this->actions]);
    }


    public function store(StoreUserRequest $request)
    {
        if ($request->image) {
            Image::make($request->image)->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/users_images/' . $request->image->hashName()));
            $user = User::create([...$request->validated(), 'image' => $request->image->hashName()]);
        } else {
            $user = User::create($request->validated());
        }

        $user->attachRole('admin');
        $user->syncPermissions((array) $request->permissions);
        session()->flash('success', __('site.added_successfully'));
        return to_route('dashboard.users.index');
    }


    public function edit(User $user)
    {
        return view('dashboard.users.edit_user', ['models' => $this->models, 'actions' => $this->actions, 'user' => $user]);
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        if ($request->has('image')) {
            $data = array_merge([ 'image' => $request->image->hashName()] , $request->validated());
        } else {
            $data = array_merge($request->validated(), ['image' => $user->image]);
        }

        if ($request->image) {
            if ($user->image != 'default.png') {
                Storage::disk('public_uploads')->delete('/users_images/' . $user->image);
            }
            Image::make($request->image)->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/users_images/' . $request->image->hashName()));
        }
        
        if ($data['password'] == null) {
            unset($data['password']);
        }
        $user->update($data);
        $user->syncPermissions((array) $request->permissions);
        session()->flash('success', __('site.updated_successfully'));
        return to_route('dashboard.users.index');
    }


    public function destroy(User $user)
    {
        if ($user->image !== 'default.png') {
            Storage::disk('public_uploads')->delete('/users_images/' . $user->image);
        }
        $user->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.users.index');
    }
}
