@extends('layouts.auth.main')
@section('title', 'Lupa Password')
@section('content')
    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div
                        class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                        <img src="{{ asset('backend/assets') }}/images/logo_ngp.png" alt="" class="img-fluid">
                    </div>
                    <div class="card-body p-sm-5">
                        <h2 class="fs-20 fw-bolder mb-4">Lupa Password</h2>
                        <h4 class="fs-13 fw-bold mb-2">Reset Password</h4>
                        <form id="form" class="w-100 mt-4 pt-2">
                            <div class="mb-4">
                                <input class="form-control" type="email" name="email" id="email" placeholder="Email"
                                    autofocus>
                                <small class="text-danger errorEmail mt-2"></small>
                            </div>
                            <div class="mt-5">
                                <button type="submit" id="reset" class="btn btn-lg btn-primary w-100">Reset
                                    Sekarang</button>
                            </div>
                        </form>
                        <div class="mt-5 text-muted">
                            <span> Tidak punya akun?</span>
                            <a href="{{ route('register') }}" class="fw-bold">Buat akun</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: $(this).serialize(),
                    url: "{{ route('password.email') }}",
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        $('#reset').attr('disabled', 'disabled');
                        $('#reset').text('Proses...');
                    },
                    complete: function() {
                        $('#reset').removeAttr('disabled');
                        $('#reset').text('Reset Sekarang');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.email) {
                                $('#email').addClass('is-invalid');
                                $('.errorEmail').html(response.errors.email.join('<br>'));
                            } else {
                                $('#email').removeClass('is-invalid');
                                $('.errorEmail').html('');
                            }
                        } else {
                            Swal.fire({
                                icon: response.status,
                                title: response.title,
                                text: response.message,
                            });
                            $('#email').removeClass('is-invalid');
                            $('.errorEmail').html('');
                        }
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
                    }
                });
            });
        });
    </script>
@endsection
