<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Merchant;
use App\Models\Transaksi;


class HomeController extends Controller
{
    //
    public function index()
    {
        $title = 'Halaman Home';
        $page = "home";
        $user = User::find(auth()->id());
        $transaksi = new Transaksi;
        $total_status = $transaksi->getTotalNominalByStatus();
        $averange_status = $transaksi->getAverangeNominalByStatus();
        $merchant_total = Merchant::all()->count();
        return view('pages.home', compact('title', 'page', 'user', 'merchant_total', 'total_status', 'averange_status'));
    }
}