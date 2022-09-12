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
                    'stok',
                    function ($row) {
                        $stok = number_format($row->stok);

                        return $stok;
                    }
                )
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

    public function create(Request $request)
    {
        $id = $request->id;

        if (!empty($id) && count($id) > 0) {

            $pilih = [];

            for($i = 0; $i < count($id); $i++) {
                $pilih[] = DB::table('obatalkes_m')->where('obatalkes_id', $id[$i])->first();
            }

            $data = [
                'pilih'       => $pilih,
                'status'    => TRUE
            ];

        } else {
            $data = [
                'msg'       => 'Harap pilih obat',
                'status'    => FALSE
            ];
        }

        return Response::json($data);
    }

    public function tambahKeranjang(Request $request)
    {
        // SECTION Tambah keranjang
        /* -------------------------------------------------------------------------- */
        /*                              TAMBAH KERANJANG                              */
        /* -------------------------------------------------------------------------- */
        // NOTE POST /admin/obat/tambah-keranjang


        $id = $request->id;
        $qty = $request->qty;

        if (!empty($id) && count($id) > 0) {
            try {

                $id = $request->id;
                $qty = $request->qty;

                if (!empty($request->racikan)) {
                    $create = DB::table('keranjang')->insertGetId([
                        'name' => $request->racikan,
                        'qty' => 1,
                        'status' => 'racikan',
                        'created_at' => Carbon::now(),
                    ]);

                    $createId = $create;

                    for($i = 0; $i < count($id); $i++) {
                        $pilih = DB::table('obatalkes_m')->where('obatalkes_id', $id[$i])->first();

                        DB::table('keranjang_obat')->insert([
                            'keranjang_id' => $createId,
                            'obat_id' => $pilih->obatalkes_id,
                            'qty_obat' => $qty[$i],
                            'created_at' => Carbon::now(),
                        ]);
                    }
                } else {

                    for($i = 0; $i < count($id); $i++) {
                        $pilih = DB::table('obatalkes_m')->where('obatalkes_id', $id[$i])->first();

                        DB::table('keranjang')->insert([
                            'name' => $pilih->obatalkes_nama,
                            'qty' => $qty[$i],
                            'status' => 'non racikan',
                            'id_obat' => $pilih->obatalkes_id,
                            'created_at' => Carbon::now(),
                        ]);
                    }

                }

                $data = [
                    'msg'       => 'Obat Berhasil Ditambahkan Ke keranjang',
                    'status'    => TRUE
                ];

            } catch (\Exception $e) {

                $data = [
                    'line'      => $e->getLine(),
                    'msg'       => $e->getMessage(),
                    'status'    => False,
                ];

            }

        } else {
            $data = [
                'msg'       => 'Harap pilih obat',
                'status'    => FALSE
            ];
        }

        return Response::json($data);
        // !SECTION Tambah keranjang
    }
}
