<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calculation;
use App\Models\Tariff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CalculationController extends Controller
{
    public function index()
    {
        $calculations = Calculation::where('user_id', Auth::id())->get();
        return view('calculations.index', compact('calculations'));
    }

    public function create()
    {
        $tariffs = Tariff::all();
        return view('calculations.create', compact('tariffs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tariff_id' => 'required|exists:tariffs,id',
            'amount' => 'required|numeric|min:0',
        ]);

        $tariff = Tariff::find($request->tariff_id);
        $total = $tariff->price * $request->amount;

        Calculation::create([
            'user_id' => Auth::id(),
            'tariff_id' => $request->tariff_id,
            'amount' => $request->amount,
            'total' => $total,
        ]);

        return redirect()->route('calculations.index')->with('success', 'Расчёт успешно сохранён.');
    }

    public function showChart()
    {
        // Получаем данные для графика
        $calculations = Calculation::where('user_id', Auth::id())
            ->selectRaw('DATE(created_at) as date, SUM(total) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Передаем данные в представление
        return view('calculations.chart', compact('calculations'));
    }
}