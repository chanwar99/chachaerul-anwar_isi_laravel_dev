<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Merchant;
use App\Models\Transaksi;

class UserController extends Controller
{
    public function getData(Request $request)
    {
        $projects = Project::query()->with('client')->orderByDesc('project_id');

        $filteredCount = $projects->count();

        // Ambil semua data jika tidak ada filter yang diterapkan
        if (!$request->all()) {
            $data = $projects->get();
        } else {
            // Ambil data dengan kondisi filter dan batasan jumlah data
            $data = $projects->offset($request->start)
                ->limit($request->length)
                ->get();
        }

        $response = [
            'draw' => $request->draw,
            'recordsTotal' => Project::count(),
            'recordsFiltered' => $filteredCount,
            'data' => $data,
        ];

        return response()->json($response);
    }

    public function index()
    {
        $title = 'Halaman User';
        $page = "user";
        $user = User::find(auth()->id());
        return view('pages.user', compact('title', 'page', 'user'));
    }


}