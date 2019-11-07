<?php

namespace App\Http\Controllers;
use App\User;
use DB;
use App\Charts\SanChart;
use Illuminate\Http\Request;

class ChartController extends Controller
{
  public function makeChart($type)
  {
    $chart = new SanChart;
    $data = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    ->get();
    $chart->labels($data->keys());
    switch ($type) {
      case 'bar':
      $chart->dataset('My dataset', 'bar', $data->values());
      break;
      case 'pie':
      $chart->dataset('My dataset', 'pie', $data->values());
      break;
      case 'donut':
      $chart->dataset('My dataset', 'donut', $data->values());
      break;
      case 'line':
      $chart->dataset('My dataset', 'line', $data->values());
      break;
      case 'area':
      $chart->dataset('My dataset', 'area', $data->values());
      break;
      case 'geo':
      $chart->dataset('My dataset', 'geo', $data->values());
      break;
      default:
      # code...
      break;
    }
    return view('chart', ['chart' => $chart]);
  }
}
