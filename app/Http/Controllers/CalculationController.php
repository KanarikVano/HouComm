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
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(total) as total'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Подготовка данных для Chart.js
        $labels = $calculations->pluck('date');
        $data = $calculations->pluck('total');

        // Прогнозирование на будущее (линейная регрессия)
        $futureDates = [];
        $futurePredictions = [];
        if ($calculations->count() > 1) {
            $x = $calculations->keys()->toArray();
            $y = $data->toArray();

            // Линейная регрессия
            $n = count($x);
            $sumX = array_sum($x);
            $sumY = array_sum($y);
            $sumXY = 0;
            $sumX2 = 0;

            for ($i = 0; $i < $n; $i++) {
                $sumXY += $x[$i] * $y[$i];
                $sumX2 += $x[$i] * $x[$i];
            }

            $slope = ($n * $sumXY - $sumX * $sumY) / ($n * $sumX2 - $sumX * $sumX);
            $intercept = ($sumY - $slope * $sumX) / $n;

            // Прогнозируем на 5 дней вперёд
            for ($i = 1; $i <= 5; $i++) {
                $futureDates[] = now()->addDays($i)->toDateString();
                $futurePredictions[] = $intercept + $slope * ($n + $i);
            }
        }

        return view('calculations.chart', compact('labels', 'data', 'futureDates', 'futurePredictions'));
    }
}