<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ResepController extends Controller
{
    public function index()
    {
        $data = [
            'link' => '/admin/resep',
            'js' => 'components.js.resep',
        ];

        return view('pages.resep', $data);
    }

    public function show($id)
    {
        // SECTION AMBIL DATA
        /* -------------------------------------------------------------------------- */
        /*                                 AMBIL DATA                                 */
        /* -------------------------------------------------------------------------- */
        // NOTE GET /admin/resep/{id}
        if (is_numeric($id)) {
            // SECTION ambil data tunggal
            $keranjang = DB::table('keranjang')
                ->where('is_active', '<>', '1')
                ->where('id', $id)
                ->first();

            $data = [
                'keranjang' => $keranjang,
            ];

            return Response::json($data);
            // !SECTION ambil data tunggal
        } else {
            // SECTION datatables
            // SECTION data
            $data   = DB::table('keranjang')
                ->where('is_active', '<>', '1')
                ->orderBy('id', 'DESC')
                ->get();
            // !SECTION data
            // SECTION kembalian
            return DataTables::of($data)
                ->editColumn(
                    'signa',
                    function ($row) {
                        $signaData = DB::table('signa_m')->where('signa_id', $row->id_signa)->first();

                        if (!empty($signaData)) {
                            $signa = $signaData->signa_nama;
                        } else {
                            $signa = '';
                        }

                        return $signa;
                    }
                )
                ->editColumn(
                    'qty',
                    function ($row) {
                        $qty = number_format($row->qty);

                        return $qty;
                    }
                )
                ->addIndexColumn()
                ->make(true);
            // !SECTION kembalian

            // !SECTION datatable
        }
        // !SECTION AMBIL DATA
    }
}
