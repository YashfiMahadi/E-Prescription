<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class KeranjangController extends Controller
{
    public function index()
    {

        $data = [
            'link' => '/admin/keranjang',
            'js' => 'components.js.keranjang',
            'keranjang' => DB::table('keranjang')->orderBy('id', 'DESC')->where('is_active', '<>', '0')->get(),
            'signa' => DB::table('signa_m')->orderBy('signa_id', 'DESC')->get(),
        ];

        return view('pages.keranjang', $data);
    }

    public function show($id)
    {
        // SECTION AMBIL DATA
        /* -------------------------------------------------------------------------- */
        /*                                 AMBIL DATA                                 */
        /* -------------------------------------------------------------------------- */
        // NOTE GET /admin/keranjang/{id}
        if (is_numeric($id)) {
            // SECTION ambil data tunggal
            $keranjang = DB::table('keranjang')
                ->where('is_active', '<>', '0')
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
                ->where('is_active', '<>', '0')
                ->orderBy('id', 'DESC')
                ->get();
            // !SECTION data
            // SECTION kembalian
            return DataTables::of($data)
                ->editColumn(
                    'qty',
                    function ($row) {
                        $qty = number_format($row->qty);

                        return $qty;
                    }
                )
                ->addColumn(
                    'action',
                    function ($row) {
                        $data   = [
                            'id' => $row->id,
                        ];
                        return view('components.buttons.keranjang', $data);
                    }
                )
                ->addIndexColumn()
                ->make(true);
            // !SECTION kembalian

            // !SECTION datatable
        }
        // !SECTION AMBIL DATA
    }

    public function simpanResep(Request $request)
    {
        // SECTION Tambah keranjang
        /* -------------------------------------------------------------------------- */
        /*                              TAMBAH KERANJANG                              */
        /* -------------------------------------------------------------------------- */
        // NOTE POST /admin/keranjang/tambah-keranjang

        $id = $request->id;
        $signa = $request->signa;
        if ($request->name == '') {
            $data = [
                'msg'       => 'Nama harus di isi',
                'status'    => FALSE
            ];
        } elseif (!empty($id) && count($id) > 0) {
            try {
                for($i = 0; $i < count($id); $i++) {
                    DB::table('keranjang')->where('id', $id[$i])->update([
                        'id_signa' => $signa[$i],
                        'is_active' => 0,
                        'updated_at' => Carbon::now(),
                    ]);
                }
                $data = [
                    'msg'       => 'Resep obat berhasil di simpan',
                    'status'    => TRUE
                ];
            } catch (\Exception $e) {
                $data = [
                    'msg'       => $e->getMessage(),
                    'status'    => False,
                ];
            }
        } else {
            $data = [
                'msg'       => 'Harap pilih keranjang',
                'status'    => FALSE
            ];
        }

        return Response::json($data);
        // !SECTION Tambah keranjang
    }

    public function destroy($id)
    {
        try {
            DB::table('keranjang')->where('id', $id)->update([
                'is_active' => 0,
            ]);

            $data = [
                'msg'       => 'Data berhasil di Remove',
                'status'    => True
            ];

        } catch (\Exception $e) {

            $data = [
                'msg'       => $e->getMessage(),
                'status'    => False,
            ];

        }

        return Response::json($data);
    }
}
