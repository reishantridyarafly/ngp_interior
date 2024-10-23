@extends('layouts.auth.main')
@section('title', 'Masuk')
@section('content')
    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div
                        class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                        <img src="{{ asset('backend/assets') }}/images/logo-abbr.png" alt="Logo - {{ config('app.name') }}"
                            class="img-fluid">
                    </div>
                    <div class="card-body p-sm-5">
                        <h2 class="fs-20 fw-bolder mb-4">Masuk NGP Interior</h2>
                        <h4 class="fs-13 fw-bold mb-2">Masuk ke Akun Anda</h4>
                        <form id="form" class="w-100 mt-4 pt-2">
                            <div class="mb-4">
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Email atau Username">
                                <small class="text-danger errorUsername mt-2"></small>
                            </div>
                            <div class="mb-4 generate-pass">
                                <div class="input-group field">
                                    <input type="password" class="form-control password" name="password" id="password"
                                        placeholder="Kata Sandi">
                                    <div class="input-group-text border-start bg-gray-2 c-pointer show-pass"
                                        data-bs-toggle="tooltip" title="Lihat/Sembunyi Sandi"><i></i></div>
                                </div>
                                <small class="text-danger errorPassword mt-2"></small>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember_me"
                                            name="remember">
                                        <label class="custom-control-label c-pointer" for="remember_me">Ingat
                                            saya</label>
                                    </div>
                                </div>
                                @if (Route::has('password.request'))
                                    <div>
                                        <a href="{{ route('password.request') }}" class="fs-11 text-primary">Lupa
                                            password?</a>
                                    </div>
                                @endif
                            </div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-lg btn-primary w-100" id="login">Masuk</button>
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

            $('#username').on('input', function() {
                $(this).removeClass('is-invalid');
                $('.errorUsername').html('');
            });

            $('#password').on('input', function() {
                $(this).removeClass('is-invalid');
                $('.errorPassword').html('');
            });

            $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: $(this).serialize(),
                    url: "{{ route('login') }}",
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        $('#login').attr('disable', 'disabled');
                        $('#login').text('Proses...');
                    },
                    complete: function() {
                        $('#login').removeAttr('disable');
                        $('#login').text('Login');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.username) {
                                $('#username').addClass('is-invalid');
                                $('.errorUsername').html(response.errors.username.join(
                                    '<br>'));
                            } else {
                                $('#username').removeClass('is-invalid');
                                $('.errorUsername').html('');
                            }

                            if (response.errors.password) {
                                $('#password').addClass('is-invalid');
                                $('.errorPassword').html(response.errors.password.join(
                                    '<br>'));
                            } else {
                                $('#password').removeClass('is-invalid');
                                $('.errorPassword').html('');
                            }
                        } else if (response.NoUsername || response.NonActiveUsername || response
                            .WrongPassword) {
                            let errorMessage = '';
                            if (response.NoUsername) {
                                errorMessage = response.NoUsername.message;
                            } else if (response.NonActiveUsername) {
                                errorMessage = response.NonActiveUsername.message;
                            } else if (response.WrongPassword) {
                                errorMessage = response.WrongPassword.message;
                            }

                            Swal.fire({
                                icon: 'error',
                                title: 'Validation Failed',
                                text: errorMessage
                            });

                            if (response.NoUsername || response.NonActiveUsername) {
                                $('#username').val('');
                            }
                            if (response.WrongPassword || response.NoUsername || response
                                .NonActiveUsername) {
                                $('#password').val('');
                            }
                        } else {
                            window.location.href = response.redirect;
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
                                <strong>Error:</strong> ${thrownError}
                            `,
                        });
                    }

                });
            });
        })
    </script>
@endsection
