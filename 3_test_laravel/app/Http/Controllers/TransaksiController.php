<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\Transaksi;
use App\Models\User;

class TransaksiController extends Controller
{
    public function getData(Request $request)
    {
        $transaksi = Transaksi::query()->with('merchant')->orderByDesc('transaksi.id');

        // // Filter berdasarkan Project Name
        // if ($request->project_name) {
        //     $projects->where('project_name', 'LIKE', '%' . $request->project_name . '%');
        // }

        // // Filter berdasarkan Project Client
        // if ($request->client_id) {
        //     $projects->where('client_id', $request->client_id);
        // }

        // Filter berdasarkan Project Status
        if ($request->status) {
            $transaksi->where('status', $request->status);
        }

        $filteredCount = $transaksi->count();

        // Ambil semua data jika tidak ada filter yang diterapkan
        if (!$request->all()) {
            $data = $transaksi->get();
        } else {
            // Ambil data dengan kondisi filter dan batasan jumlah data
            $data = $transaksi->offset($request->start)
                ->limit($request->length)
                ->get();
        }

        $response = [
            'draw' => $request->draw,
            'recordsTotal' => Transaksi::count(),
            'recordsFiltered' => $filteredCount,
            'data' => $data,
        ];

        return response()->json($response);
    }

    public function index()
    {
        $title = 'Halaman Transaksi';
        $page = "transaksi";
        $user = User::find(auth()->id());
        return view('pages.transaksi', compact('title', 'page', 'user'));
    }
}