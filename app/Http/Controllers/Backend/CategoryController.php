<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $category = Category::orderBy('name', 'asc')->get();
            return DataTables::of($category)
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
        return view('backend.category.index');
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:categories,name,' . $id,
            ],
            [
                'name.required' => 'Silakan isi nama kategori terlebih dahulu.',
                'name.unique' => 'Nama kategori sudah tersedia.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $category = Category::updateOrCreate([
                'id' => $id
            ], [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);

            return response()->json(['category' => $category, 'message' => 'Data berhasil disimpan.']);
        }
    }

    public function edit($id)
    {
        $data = Category::find($id);
        return response()->json($data);
    }

    public function destroy(Request $request)
    {
        $category = Category::find($request->id);

        if ($category) {
            $category->delete();
            return response()->json(['message' => 'Data berhasil dihapus']);
        }

        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }
}
