<?php

namespace App\Http\Controllers\Staff;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\StaffStoreUserRequest;
use App\Http\Requests\User\StaffUpdateUserRequest;

class StaffUserController extends Controller
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

        if ($request->filled('role') && $request->input('role') !== 'all') {
            $query->whereHas('roles', function ($query) use ($request) {
                $query->where('name', $request->input('role'));
            });
        }

        if ($request->has('sort')) {
            switch ($request->input('sort')) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'created_asc':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'created_desc':
                    $query->orderBy('created_at', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        return $query->paginate(15);
    }

    public function index(SearchRequest $request)
    {
        $users = $this->search($request);
        return view('staff.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('staff.users.create', compact('roles'));
    }

    public function store(StaffStoreUserRequest $request)
    {

        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $defaultRole = Role::where('name', 'client')->first();

        if (isset($validated['roles']) && !empty($validated['roles'])) {
            $user->roles()->attach($validated['roles']);
        } else {
            if ($defaultRole) {
                $user->roles()->attach($defaultRole->id);
            }
        }

        flash()->success("User '" . e($user->name) . "' created successfully.");

        return redirect()->route('staff.users.index');
    }

    public function show()
    {
        return redirect()->route('staff.users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('staff.users.edit', compact('user', 'roles'));
    }

    public function update(StaffUpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        if (auth()->user()->hasRole('Staff') && auth()->user()->id !== $user->id) {
            flash()->error("You can only update your own account.");
            return redirect()->back();
        }

        if (auth()->user()->hasRole('Staff') && ($user->hasRole('Admin') || $user->hasRole('Client'))) {
            flash()->error("You are not allowed to update the admin or client.");
            return redirect()->back();
        }

        if (!empty($validated['name'])) {
            $user->name = $validated['name'];
        }

        if (!empty($validated['email'])) {
            $user->email = $validated['email'];
        }

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $userChanged = $user->isDirty();
        if ($userChanged) {
            $user->save();
        }

        if ($userChanged) {
            flash()->success("User '" . e($user->name) . "' updated successfully.");
        } else {
            flash()->info("No changes were made to the user '" . e($user->name) . "'.");
        }

        return redirect()->route('staff.users.index');
    }
}
