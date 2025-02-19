<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tariff;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {
        $tariffs = Tariff::all();
        return view('admin.tariffs.index', compact('tariffs'));
    }

    public function create()
    {
        return view('admin.tariffs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Tariff::create($request->only('name', 'price'));

        return redirect()->route('admin.tariffs.index')->with('success', 'Тариф успешно добавлен.');
    }

    public function edit(Tariff $tariff)
    {
        return view('admin.tariffs.edit', compact('tariff'));
    }

    public function update(Request $request, Tariff $tariff)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $tariff->update($request->only('name', 'price'));

        return redirect()->route('admin.tariffs.index')->with('success', 'Тариф успешно обновлён.');
    }

    public function destroy(Tariff $tariff)
    {
        $tariff->delete();
        return redirect()->route('admin.tariffs.index')->with('success', 'Тариф успешно удалён.');
    }
}
