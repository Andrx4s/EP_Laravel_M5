<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Role\RoleCreateValidation;
use App\Http\Requests\Admin\Role\RoleUpdateValidation;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Вызов страницы со всеми ролями
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.roles', compact('roles'));
    }

    /**
     * Вызов страницы с создание роли
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        $request->session()->flashInput([]);
        return view('admin.role.createOrUpdate');
    }

    /**
     * Функция создания роли
     * @param RoleCreateValidation $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleCreateValidation $request)
    {
        $validate = $request->validated();
        Role::create($validate);
        return redirect()->route('admin.roles.index')->with(['create' => true]);
    }

    /**
     * @param Role $role
     * @return void
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Вызов страницы редактирование роли
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Role $role)
    {
        $request->session()->flashInput($role->toArray());
        return view('admin.role.createOrUpdate', compact('role'));
    }

    /**
     * Функция для редактирования роли
     * @param RoleUpdateValidation $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleUpdateValidation $request, Role $role)
    {
        $validate = $request->validated();
        $role->update($validate);
        return redirect()->route('admin.roles.index')->with(['success' => true]);
    }

    /**
     * Функция для удаления роли
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with(['delete' => true]);
    }
}
