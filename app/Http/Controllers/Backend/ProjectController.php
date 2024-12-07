<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $project = Project::orderBy('name', 'asc')->get();
            return DataTables::of($project)
                ->addIndexColumn()
                ->addColumn('category', function ($data) {
                    return $data->category->name;
                })
                ->addColumn('price', function ($data) {
                    return 'Rp ' . number_format($data->price, 0, ',', '.');
                })
                ->addColumn('action', function ($data) {
                    return '
                        <div class="hstack gap-2 justify-content-end">
                            <div class="dropdown">
                                <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                    <i class="feather feather-more-horizontal"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="' . route('project.edit', $data->id) . '" class="dropdown-item">
                                            <i class="feather feather-edit-3 me-3"></i>
                                            <span>Edit</span>
                                        </a>
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
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('backend.project.index');
    }

    public function create()
    {
        $categories = Category::all();
        $customers = User::where('role', 'customer')->get();
        return view('backend.project.add', compact(['categories', 'customers']));
    }

    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|unique:projects,name',
                'customer_name' => 'required',
                'category' => 'required',
                'address' => 'required',
                'description' => 'required',
                'photo' => 'required|mimes:jpg,png,jpeg,webp,svg|file|max:5120',
            ],
            [
                'name.required' => 'Silakan isi nama terlebih dahulu.',
                'name.string' => 'Nama harus berupa teks.',
                'name.unique' => 'Nama sudah tersedia.',
                'price.required' => 'Silakan isi harga terlebih dahulu.',
                'customer_name.required' => 'Silakan pilih nama pelanggan terlebih dahulu.',
                'category.required' => 'Silakan pilih kategori terlebih dahulu.',
                'address.required' => 'Silakan isi alamat terlebih dahulu.',
                'description.required' => 'Silakan isi deskripsi terlebih dahulu.',
                'photo.required' => 'Silakan isi foto terlebih dahulu.',
                'photo.image' => 'File harus berupa gambar.',
                'photo.mimes' => 'Ekstensi file harus berupa: jpg, png, jpeg, webp, atau svg.',
                'photo.file' => 'File harus berupa gambar.',
                'photo.max' => 'Ukuran file tidak boleh lebih dari 5 MB.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            try {
                $project = new Project();
                $project->name = $request->name;
                $project->slug = Str::slug($request->name);
                $project->address = $request->address;
                $project->description = $request->description;
                $project->price = $request->price ? str_replace(['Rp', ' ', '.'], '', $request->price) : null;
                $project->customer_name = $request->customer_name;
                $project->category_id = $request->category;

                if ($request->hasFile('photo')) {
                    $photo = $request->file('photo');
                    $photoName = time() . '_proyek_' . $photo->getClientOriginalName();
                    Storage::putFileAs('uploads/project', $photo, $photoName);
                    $project->photo = $photoName;
                }
                $project->save();

                return response()->json(['success' => 'Data berhasil disimpan']);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'An error occurred',
                    'error' => $e->getMessage()
                ], 500);
            }
        }
    }

    public function edit($id)
    {
        $project = Project::find($id);
        $categories = Category::all();
        $customers = User::where('role', 'customer')->get();
        return view('backend.project.edit', compact(['categories', 'customers', 'project']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|unique:projects,name,' . $id,
                'price' => 'required',
                'customer_name' => 'required',
                'category' => 'required',
                'address' => 'required',
                'description' => 'required',
                'photo' => 'mimes:jpg,png,jpeg,webp,svg|file|max:5120',
            ],
            [
                'name.required' => 'Silakan isi nama terlebih dahulu.',
                'name.string' => 'Nama harus berupa teks.',
                'name.unique' => 'Nama sudah tersedia.',
                'price.required' => 'Silakan isi harga terlebih dahulu.',
                'customer_name.required' => 'Silakan pilih nama pelanggan terlebih dahulu.',
                'category.required' => 'Silakan pilih kategori terlebih dahulu.',
                'address.required' => 'Silakan isi alamat terlebih dahulu.',
                'description.required' => 'Silakan isi deskripsi terlebih dahulu.',
                'photo.image' => 'File harus berupa gambar.',
                'photo.mimes' => 'Ekstensi file harus berupa: jpg, png, jpeg, webp, atau svg.',
                'photo.file' => 'File harus berupa gambar.',
                'photo.max' => 'Ukuran file tidak boleh lebih dari 5 MB.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            try {
                $project = Project::find($id);
                $project->name = $request->name;
                $project->slug = Str::slug($request->name);
                $project->address = $request->address;
                $project->description = $request->description;
                $project->price = str_replace(['Rp', ' ', '.'], '', $request->price);
                $project->customer_name = $request->customer_name;
                $project->category_id = $request->category;

                if ($request->hasFile('photo')) {
                    if ($project->photo) {
                        Storage::disk('private')->delete('uploads/project/' . $project->photo);
                    }

                    $photo = $request->file('photo');
                    $photoName = time() . '_proyek_' . $photo->getClientOriginalName();
                    Storage::putFileAs('uploads/project', $photo, $photoName);
                    $project->photo = $photoName;
                }

                $project->save();

                return response()->json(['success' => 'Data berhasil disimpan']);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'An error occurred',
                    'error' => $e->getMessage()
                ], 500);
            }
        }
    }

    public function destroy(Request $request)
    {
        try {
            $project = Project::find($request->id);
            if ($project) {
                if ($project->photo) {
                    Storage::disk('private')->delete('uploads/project/' . $project->photo);
                }

                $project->delete();
                return response()->json(['message' => 'Data berhasil dihapus']);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $product = Project::find($request->id);

            if ($product) {
                $product->status = $request->status;
                $product->save();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Status berhasil diperbarui'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Project tidak ditemukan'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
