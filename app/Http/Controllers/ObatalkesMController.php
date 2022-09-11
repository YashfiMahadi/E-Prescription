<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ObatalkesMController extends Controller
{
    public function index()
    {
        $data = [
            'link' => '/admin/obat',
            'js' => 'components.js.obat',
        ];

        return view('pages.obat', $data);
    }

    public function show($id)
    {
        // SECTION AMBIL DATA
        /* -------------------------------------------------------------------------- */
        /*                                 AMBIL DATA                                 */
        /* -------------------------------------------------------------------------- */
        // NOTE GET /admin/obat/{id}
        if (is_numeric($id)) {
            // SECTION ambil data tunggal
            $obat = DB::table('obatalkes_m')
                ->where('obatalkes_id', $id)
                ->first();

            $data = [
                'obat' => $obat,
            ];

            return Response::json($data);
            // !SECTION ambil data tunggal
        } else {
            // SECTION datatables
            // SECTION data
            $data   = DB::table('obatalkes_m')
                ->orderBy('obatalkes_id', 'DESC')
                ->get();
            // !SECTION data
            // SECTION kembalian
            return DataTables::of($data)
                ->editColumn(
                    'created_date',
                    function ($row) {
                        $created_date = date('d, M Y H:i', strtotime($row->created_date));

                        return $created_date;
                    }

                )
                ->addColumn(
                    'action',
                    function ($row) {
                        $data   = [
                            'id'        => $row->obatalkes_id,
                            'stok'      => $row->stok,
                        ];
                        return view('components.buttons.obat', $data);
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
