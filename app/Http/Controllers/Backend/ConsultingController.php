<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ConsultingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::where('id', '!=', Auth::user()->id)->where('role', '=', 'admin')->orderBy('first_name', 'asc')->get();
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    $avatarUrl = asset('storage/users-avatar/' . $data->avatar);
                    return '
                        <a href="customers-view.html" class="hstack gap-3">
                            <div class="avatar-image avatar-md">
                                <img src="' . $avatarUrl . '" alt="" class="img-fluid">
                            </div>
                            <div>
                                <span class="text-truncate-1-line">' . htmlspecialchars($data->first_name . ' ' . $data->last_name, ENT_QUOTES, 'UTF-8') . '</span>
                            </div>
                        </a>';
                })
                ->addColumn('status', function ($data) {
                    $checked = $data->active_status == 0 ? 'checked' : '';
                    return '<div class="form-check form-switch">
                                <input class="form-check-input status-toggle" type="checkbox" role="switch" data-id="' . $data->id . '" ' . $checked . '>
                                <label class="form-check-label" for="status">' . ($data->active_status == 0 ? 'Aktif' : 'Tidak Aktif') . '</label>
                            </div>';
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
                                        <a href="' . url('chat/' . $data->id) . '" target="_blank" class="dropdown-item">
                                            <i class="feather feather-message-circle me-3"></i>
                                            <span>Kirim pesan</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>';
                })
                ->rawColumns(['name', 'status', 'action'])
                ->make(true);
        }
        return view('backend.consultation.index');
    }
}
