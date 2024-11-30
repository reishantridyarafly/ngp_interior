<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class BankAccountController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $bankaccount = BankAccount::orderBy('name', 'asc')->get();
            return DataTables::of($bankaccount)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return '
                        <div class="hstack gap-2 justify-content-end">
                            <div class="dropdown">
                                <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                    <i class="feather feather-more-horizontal"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <button class="dropdown-item" id="btnEdit" data-id="' . $data->id . '">
                                            <i class="feather feather-edit-3 me-3"></i>
                                            <span>Edit</span>
                                        </button>
                                    <li>
                                        <button class="dropdown-item" id="btnDelete" data-id="' . $data->id . '">
                                            <i class="feather feather-trash-2 me-3"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.bankaccount.index');
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'bank_name' => 'required',
                'name' => 'required',
                'number' => 'required|unique:bank_accounts,number,' . $id,
            ],
            [
                'bank_name.required' => 'Silakan isi nama bank terlebih dahulu.',
                'name.required' => 'Silakan isi nama pemilik terlebih dahulu.',
                'number.required' => 'Silakan isi no rekening terlebih dahulu.',
                'number.unique' => 'No rekening sudah tersedia.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $bankaccount = BankAccount::updateOrCreate([
                'id' => $id
            ], [
                'bank_name' => $request->bank_name,
                'name' => $request->name,
                'number' => $request->number,
            ]);

            return response()->json(['bankaccount' => $bankaccount, 'message' => 'Data berhasil disimpan.']);
        }
    }

    public function edit($id)
    {
        $data = BankAccount::find($id);
        return response()->json($data);
    }

    public function destroy(Request $request)
    {
        $bankaccount = BankAccount::find($request->id);

        if ($bankaccount) {
            $bankaccount->delete();
            return response()->json(['message' => 'Data berhasil dihapus']);
        }

        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }
}
