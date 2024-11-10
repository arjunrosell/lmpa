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

        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Define the default role
        $defaultRole = Role::where('name', 'client')->first();

        // Assign roles to the user
        if (isset($validated['roles']) && !empty($validated['roles'])) {
            $user->roles()->attach($validated['roles']);
        } else {
            // Attach default role if no roles provided
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

        // Update user details
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Update password if provided
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        // Check if there are any changes to the user model
        $userChanged = $user->isDirty();

        // Save the user if there are any changes
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
