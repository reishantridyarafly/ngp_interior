<div class="row">
    <div class="col-lg-12">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Installation</h5>
                <ul>
                    <li>Pelunasan h-1 pengiriman.</li>
                    <li>Installasi 1-2 hari dilokasi.</li>
                </ul>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="mb-3">
                            <label for="invoice" class="form-label">Invoice</label>
                            <input type="text" id="invoice" name="invoice" class="form-control"
                                value="{{ $order->invoice }}" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Pemesan</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ $user->first_name . ' ' . $user->last_name }}" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="mb-3">
                            <label for="telephone" class="form-label">No Telepon</label>
                            <input type="text" id="telephone" name="telephone" class="form-control"
                                value="{{ $user->telephone }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-4 col-md-12">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control"
                                value="{{ $user->email }}" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="mb-3">
                            <label for="location" class="form-label">Lokasi</label>
                            <input type="text" id="location" name="location" class="form-control"
                                value="{{ $order->location }}" disabled>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="mb-3">
                            <label for="order_date" class="form-label">Tanggal Pemesanan</label>
                            <input type="date" id="order_date" name="order_date" value="{{ $order->order_date }}"
                                disabled class="form-control">
                        </div>
                    </div>
                </div>
                <form id="form_installation">
                    <div class="mb-3">
                        <label for="last_payment" class="form-label">Bukti pelunasan <span class="text-danger">*</span>
                        </label>
                        <input type="hidden" name="id" id="id" value="{{ $order->id }}">
                        @if ($order->last_payment == null)
                            <input type="file" class="form-control" name="last_payment" id="last_payment"
                                accept="image/*">
                            <small class="text-danger errorLastPayment"></small>
                        @else
                            <div>
                                <a href="{{ route('file.last_payment', $order->last_payment) }}" target="_blank">
                                    <img style="border-radius: 8px; height: 500px"
                                        src="{{ route('file.last_payment', $order->last_payment) }}"
                                        alt="{{ $order->last_payment }}">
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Persetujuan <span class="text-danger">*</span>
                        </label>
                        @if (auth()->user()->role == 'admin')
                            <select name="status_installation" id="status_installation" class="form-control">
                                <option value="0">- Pilih Status -</option>
                                <option value="1" {{ $order->status_installation == '1' ? 'selected' : '' }}>
                                    Setuju
                                </option>
                                <option value="2" {{ $order->status_installation == '2' ? 'selected' : '' }}>Tolak
                                </option>
                            </select>
                            <small class="text-danger errorStatusInstallation"></small>
                        @else
                            <div>
                                @if ($order->status_installation == 0)
                                    <span class="badge bg-warning text-dark">Sedang Diproses</span>
                                @elseif ($order->status_installation == 1)
                                    <span class="badge bg-success">Telah Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Telah Ditolak</span>
                                @endif
                            </div>
                        @endif
                    </div>
                    @if ($order->status_installation == 0)
                        <div class="col-lg-12 col-md-6">
                            <div class="form-group mb-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary" id="save_installation">Simpan</button>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

@section('script_installation')
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#form_installation').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: new FormData(this),
                    url: "{{ route('orderInstallation.store') }}",
                    type: "POST",
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function() {
                        $('#save_installation').attr('disable', 'disabled');
                        $('#save_installation').text('Proses...');
                    },
                    complete: function() {
                        $('#save_installation').removeAttr('disable');
                        $('#save_installation').html('Simpan');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.last_payment) {
                                $('#last_payment').addClass('is-invalid');
                                $('.errorLastPayment').html(response.errors.last_payment.join(
                                    '<br>'));
                            } else {
                                $('#last_payment').removeClass('is-invalid');
                                $('.errorLastPayment').html('');
                            }

                            if (response.errors.status_installation) {
                                $('#status_installation').addClass('is-invalid');
                                $('.errorStatusInstallation').html(response.errors
                                    .status_installation.join(
                                        '<br>'));
                            } else {
                                $('#status_installation').removeClass('is-invalid');
                                $('.errorStatusInstallation').html('');
                            }
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.success,
                            }).then(function() {
                                location.reload();
                            });
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);

                        let errorMessage = "";
                        if (xhr.status === 0) {
                            errorMessage =
                                "Network error, please check your internet connection.";
                        } else if (xhr.status >= 400 && xhr.status < 500) {
                            errorMessage = "Client error (" + xhr.status + "): " + xhr
                                .responseText;
                        } else if (xhr.status >= 500) {
                            errorMessage = "Server error (" + xhr.status + "): " + xhr
                                .responseText;
                        } else {
                            errorMessage = "Unexpected error: " + xhr.responseText;
                        }

                        Swal.fire({
                            icon: "error",
                            title: "Error " + xhr.status,
                            html: `
                                <strong>Status:</strong> ${xhr.status}<br>
                                <strong>Error:</strong> ${thrownError}<br>
                            `,
                        });
                    }
                });
            });
        });
    </script>
@endsection
