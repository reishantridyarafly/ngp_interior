@extends('layouts.backend.main')
@section('title', 'Item')
@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">@yield('title')</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Pemesanan</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('order.detail', $section->order->invoice) }}">
                                {{ $section->order->invoice }}
                            </a>
                        </li>
                        <li class="breadcrumb-item">@yield('title')</li>
                    </ul>
                </div>
            </div>
            <!-- [ page-header ] end -->

            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="card stretch stretch-full">
                    <form id="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <h5 class="fw-bold">Bagian Item:</h5>
                                    </div>
                                    <input type="hidden" name="id_section" id="id_section" value="{{ $section->id }}">
                                    <div class="table-responsive">
                                        <table class="table table-bordered overflow-hidden" id="tab_logic">
                                            <thead>
                                                <tr class="single-item">
                                                    <th class="text-center" width="1">#</th>
                                                    <th class="text-center wd-350">Nama</th>
                                                    <th class="text-center wd-150">Vol</th>
                                                    <th class="text-center wd-150">Satuan</th>
                                                    <th class="text-center wd-150">Harga Satuan</th>
                                                    <th class="text-center wd-150">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($items && $items->isNotEmpty())
                                                    @foreach ($items as $item)
                                                        <tr id="addr{{ $loop->index }}">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <input type="hidden" name="item_id[]"
                                                                value="{{ $item->id ?? '' }}">
                                                            <td><input type="text" name="description[]"
                                                                    placeholder="Nama Item" class="form-control"
                                                                    value="{{ $item->description }}" required></td>
                                                            <td><input type="text" name="volume[]" placeholder="Volume"
                                                                    class="form-control" value="{{ $item->volume }}"
                                                                    required></td>
                                                            <td><input type="text" name="unit[]" placeholder="Satuan"
                                                                    class="form-control" value="{{ $item->unit }}"
                                                                    required></td>
                                                            <td><input type="text" name="unit_price[]"
                                                                    placeholder="Harga Satuan"
                                                                    class="form-control unit_price"
                                                                    value="{{ $item->unit_price }}" required></td>
                                                            <td><input type="text" name="subtotal[]"
                                                                    class="form-control subtotal"
                                                                    value="{{ $item->subtotal }}" readonly></td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr id="addr0">
                                                        <td>1</td>
                                                        <td><input type="text" name="description[]"
                                                                placeholder="Nama Item" class="form-control" required></td>
                                                        <td><input type="text" name="volume[]" placeholder="Volume"
                                                                class="form-control" required></td>
                                                        <td><input type="text" name="unit[]" placeholder="Satuan"
                                                                class="form-control" required></td>
                                                        <td><input type="text" name="unit_price[]"
                                                                placeholder="Harga Satuan" class="form-control unit_price"
                                                                required></td>
                                                        <td><input type="text" name="subtotal[]"
                                                                class="form-control subtotal" readonly></td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-end gap-2 mt-3">
                                        <button id="delete_row" type="button"
                                            class="btn btn-md bg-soft-danger text-danger">Hapus</button>
                                        <button id="add_row" type="button" class="btn btn-md btn-primary">Tambah
                                            Baris</button>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <h5 class="fw-bold">Total Keseluruhan:</h5>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="tab_logic_total">
                                            <tbody>
                                                <tr class="single-item">
                                                    <th class="fs-10 text-dark text-uppercase">Subtotal Keseluruhan
                                                    </th>
                                                    <td class="w-25"><input type="text" name="sub_total"
                                                            placeholder="0.00" value="{{ $section->subtotal ?? 0 }}"
                                                            class="form-control border-0 bg-transparent p-0"
                                                            id="sub_total" readonly></td>
                                                </tr>
                                                <tr class="single-item">
                                                    <th class="fs-10 text-dark text-uppercase">Diskon (Rp)</th>
                                                    <td class="w-25">
                                                        <div class="input-group mb-2 mb-sm-0">
                                                            <input type="text"
                                                                class="form-control border-0 bg-transparent p-0"
                                                                name="discount" id="discount" placeholder="0"
                                                                value="{{ $section->discount ?? 0 }}">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="single-item">
                                                    <th class="fs-10 text-dark text-uppercase bg-gray-100">Total
                                                        Keseluruhan
                                                    </th>
                                                    <td class="bg-gray-100 w-25"><input type="text"
                                                            name="total_amount" id="total_amount" placeholder="0.00"
                                                            value="{{ $section->total_amount ?? 0 }}"
                                                            class="form-control border-0 bg-transparent p-0 fw-700 text-dark"
                                                            readonly></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 mt-3">
                                    <div class="form-group mb-3 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary" id="save">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </main>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.10.5/autoNumeric.min.js"></script>

    <script>
        const autoNumericOptions = {
            currencySymbol: 'Rp ',
            decimalCharacter: ',',
            digitGroupSeparator: '.',
            decimalPlaces: 0,
            allowDecimalPadding: false,
            minimumValue: '0'
        };

        const autoNumericElements = {
            discount: null,
            sub_total: null,
            total_amount: null
        };

        function initializeGlobalAutoNumeric() {
            // Initialize static elements only once
            autoNumericElements.discount = new AutoNumeric('#discount', autoNumericOptions);
            autoNumericElements.sub_total = new AutoNumeric('#sub_total', autoNumericOptions);
            autoNumericElements.total_amount = new AutoNumeric('#total_amount', autoNumericOptions);
        }

        function initializeRowAutoNumeric(row) {
            // Initialize AutoNumeric only if it's not already initialized
            const unitPriceInput = row.querySelector('input[name="unit_price[]"]');
            const subtotalInput = row.querySelector('input[name="subtotal[]"]');

            if (!AutoNumeric.getAutoNumericElement(unitPriceInput)) {
                new AutoNumeric(unitPriceInput, autoNumericOptions);
            }

            if (!AutoNumeric.getAutoNumericElement(subtotalInput)) {
                new AutoNumeric(subtotalInput, autoNumericOptions);
            }
        }

        function calculateRowSubtotal(row) {
            try {
                const volumeInput = row.querySelector('input[name="volume[]"]');
                const unitPriceInput = row.querySelector('input[name="unit_price[]"]');
                const subtotalInput = row.querySelector('input[name="subtotal[]"]');

                if (!volumeInput || !unitPriceInput || !subtotalInput) return;

                const volume = parseFloat(volumeInput.value) || 0;
                const unitPrice = AutoNumeric.getAutoNumericElement(unitPriceInput)?.getNumericString() || 0;
                const subtotal = volume * parseFloat(unitPrice);

                const subtotalElement = AutoNumeric.getAutoNumericElement(subtotalInput);
                if (subtotalElement) {
                    subtotalElement.set(subtotal);
                }
            } catch (error) {
                console.error('Error in calculateRowSubtotal:', error);
            }
        }

        function calculateTotal() {
            try {
                let total = 0;
                document.querySelectorAll('input[name="subtotal[]"]').forEach(function(subtotalField) {
                    const subtotalAN = AutoNumeric.getAutoNumericElement(subtotalField);
                    if (subtotalAN) {
                        const value = parseFloat(subtotalAN.getNumericString()) || 0;
                        total += value;
                    }
                });

                if (autoNumericElements.sub_total) {
                    autoNumericElements.sub_total.set(total);
                }

                // Get discount and calculate final total
                const discount = autoNumericElements.discount ? parseFloat(autoNumericElements.discount
                    .getNumericString()) || 0 : 0;
                const finalTotal = Math.max(0, total - discount);

                // Set the final total amount
                if (autoNumericElements.total_amount) {
                    autoNumericElements.total_amount.set(finalTotal);
                }
            } catch (error) {
                console.error('Error in calculateTotal:', error);
            }
        }

        document.addEventListener('input', function(e) {
            if (e.target.matches('input[name="volume[]"], input[name="unit_price[]"]')) {
                const row = e.target.closest('tr');
                if (row) {
                    calculateRowSubtotal(row);
                    calculateTotal();
                }
            } else if (e.target.id === 'discount') {
                calculateTotal();
            }
        });

        let i = {{ $items->count() + 1 ?? 1 }};
        $("#add_row").click(function() {
            i++;
            const newRow = `<tr id="addr${i}">
        <td>${i}</td>
        <td><input type="text" name="description[]" placeholder="Nama Item" class="form-control" required></td>
        <td><input type="text" name="volume[]" placeholder="Volume" class="form-control" required></td>
        <td><input type="text" name="unit[]" placeholder="Satuan" class="form-control" required></td>
        <td><input type="text" name="unit_price[]" placeholder="Harga Satuan" class="form-control unit_price" required></td>
        <td><input type="text" name="subtotal[]" class="form-control subtotal" readonly></td>
    </tr>`;
            $("#tab_logic tbody").append(newRow);

            // Initialize AutoNumeric for the new row's inputs
            initializeRowAutoNumeric(document.querySelector(`#addr${i}`));
        });

        $("#delete_row").click(function() {
            if (i > 1) {
                $("#addr" + i).remove();
                i--;
                calculateTotal();
            } else if (i === 1) {
                $("#addr" + i).remove();
                i = 0;
                calculateTotal();
            }
        });



        $(document).ready(function() {
            initializeGlobalAutoNumeric();

            // Initialize AutoNumeric for each row on page load
            document.querySelectorAll('#tab_logic tbody tr').forEach(initializeRowAutoNumeric);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: $(this).serialize(),
                    url: "{{ route('orderItem.store') }}",
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        $('#save').attr('disabled', 'disabled');
                        $('#save').text('Proses...');
                    },
                    complete: function() {
                        $('#save').removeAttr('disabled');
                        $('#save').text('Simpan');
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: response.message,
                        }).then(function() {
                            top.location.href =
                                "{{ route('order.detail', $section->order->invoice) }}";
                        });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
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
                            html: `<strong>Status:</strong> ${xhr.status}<br><strong>Error:</strong> ${thrownError}<br>`,
                        });

                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            });
        });
    </script>
@endsection
