<?php

namespace App\Http\Controllers;

use App\Exports\MenuExport;
use App\Models\Menu;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Menu::all();

        return view('pages.menu.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.menu.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Menu::create([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga
        ]);

        return redirect()->route('menu.index')->with('insert-data-success', 'Data baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Menu::findOrFail($id);

        return view('pages.menu.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Menu::findOrFail($id);
        $data = $request->all();

        $item->update($data);

        return redirect()->route('menu.index')->with('update-data-success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Menu::findOrFail($id);
        $item->delete();

        return redirect()->route('menu.index')->with('delete-data-success', 'Data berhasil dihapus');
    }

    public function deleted()
    {
        $data = Menu::onlyTrashed()->get();
        return view('pages.menu.deleted', [
            'data' => $data,
        ]);
    }

    public function restore(string $id)
    {
        $item = Menu::withTrashed()->findOrFail($id);
        $item->restore();

        return redirect()->route('menu.index')->with('restore-data-success', 'Data berhasil dipulihkan');
    }

    public function export()
    {
        return Excel::download(new MenuExport, 'Data Menu.xlsx');
    }
}
