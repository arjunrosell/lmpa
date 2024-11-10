<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\AdminStoreUserRequest;
use App\Http\Requests\User\AdminUpdateUserRequest;

class AdminUserController extends Controller
{
    private function search(SearchRequest $request)
    {
        $query = User::with('roles');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhereHas('roles', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });
        }

        return $query->paginate(15);
    }

    public function index(SearchRequest $request)
    {
        $users = $this->search($request);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(AdminStoreUserRequest $request)
    {
        $validated = $request->validated();
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        $user->roles()->attach($validated['roles']);
        flash()->success("User '" . e($user->name) . "' created successfully.");
        return redirect()->route('admin.users.index');
    }

    public function show()
    {
        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(AdminUpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
        $userChanged = $user->isDirty();
        $currentRoles = $user->roles->pluck('id')->toArray();
        $rolesChanged = array_diff($currentRoles, $validated['roles']) !== [] || array_diff($validated['roles'], $currentRoles) !== [];
        $user->roles()->sync($validated['roles']);
        if ($userChanged) {
            $user->save();
        }
        if ($userChanged || $rolesChanged) {
            flash()->success("User '" . e($user->name) . "' updated successfully.");
        } else {
            flash()->info("No changes were made to the user '" . e($user->name) . "'.");
        }
        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        flash()->success("User '" . e($user->name) . "' deleted successfully.");
        return redirect()->route('admin.users.index');
    }
}
