<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {

            $data = Role::select('*');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('Actions', 'roles/datatables/actions')
                ->rawColumns(['Actions'])
                ->make(true);
        }

        return view('roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $permissions = Permission::all();
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255','unique:roles,name'],
            'guard_name' => ['required', 'string', 'max:3'],
        ]);

        $role = Role::create([
            'name' => $request['name'],
            'guard_name' => $request['guard_name'],
        ]);

        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index')->withSuccessMessage('Rol Creado con Exito!');
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
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255','unique:roles,name,' . $role->id],
            'guard_name' => ['required', 'string', 'max:3'],
        ]);

        $role->update([
            'name' => $request['name'],
            'guard_name' => $request['guard_name'],
        ]);

        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index')->withSuccessMessage('Rol Actualizado con Exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return response()->json(['success' => 'Rol Eliminado con Exito']);
    }
}
