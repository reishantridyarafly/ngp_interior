@extends('layouts.auth.main')
@section('title', 'Reset Password')
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
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="mb-4">
                                <input class="form-control" type="email" name="email" id="email" placeholder="Email"
                                    autofocus value="{{ $request->email }}">
                                <small class="text-danger errorEmail mt-2"></small>
                            </div>
                            <div class="mb-4 generate-pass">
                                <div class="input-group field">
                                    <input type="password" class="form-control password" name="password" id="password"
                                        placeholder="Password">
                                    <div class="input-group-text border-start bg-gray-2 c-pointer show-pass"
                                        data-bs-toggle="tooltip" title="Lihat/Sembunyi Sandi"><i></i></div>
                                </div>
                                <small class="text-danger errorPassword mt-2"></small>
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control" placeholder="Konfirmasi Password"
                                    id="password_confirmation" name="password_confirmation">
                                <small class="text-danger errorConfirmPassword mt-2"></small>
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
                    url: "{{ route('password.store') }}",
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

                            if (response.errors.password) {
                                $('#password').addClass('is-invalid');
                                $('.errorPassword').html(response.errors.password.join('<br>'));
                            } else {
                                $('#password').removeClass('is-invalid');
                                $('.errorPassword').html('');
                            }

                            if (response.errors.password_confirmation) {
                                $('#password_confirmation').addClass('is-invalid');
                                $('.errorConfirmPassword').html(response.errors
                                    .password_confirmation.join('<br>'));
                            } else {
                                $('#password_confirmation').removeClass('is-invalid');
                                $('.errorConfirmPassword').html('');
                            }
                        } else {
                            Swal.fire({
                                icon: response.status,
                                title: response.title,
                                text: response.message,
                            }).then(function() {
                                top.location.href =
                                    "{{ route('login') }}";
                            });
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
