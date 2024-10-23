@extends('layouts.auth.main')
@section('title', 'Daftar')
@section('content')
    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div
                        class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                        <img src="{{ asset('backend/assets') }}/images/logo-abbr.png" alt="" class="img-fluid">
                    </div>
                    <div class="card-body p-sm-5">
                        <h2 class="fs-20 fw-bolder mb-4">Pendaftaran NGP Interior</h2>
                        <h4 class="fs-13 fw-bold mb-2">Daftar Akun</h4>
                        <form id="form" class="w-100 mt-4 pt-2">
                            <div class="mb-4">
                                <input type="text" class="form-control" name="first_name" id="first_name"
                                    placeholder="Nama Depan">
                                <small class="text-danger errorFirstName mt-2"></small>
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control" name="last_name" id="last_name"
                                    placeholder="Nama Belakang">
                            </div>
                            <div class="mb-4">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Email">
                                <small class="text-danger errorEmail mt-2"></small>
                            </div>
                            <div class="mb-4">
                                <input type="number" class="form-control" name="telephone" id="telephone"
                                    placeholder="No Telepon">
                                <small class="text-danger errorTelephone mt-2"></small>
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
                                <button type="submit" id="register" class="btn btn-lg btn-primary w-100">Buat
                                    Akun</button>
                            </div>
                        </form>
                        <div class="mt-5 text-muted">
                            <span>Sudah punya akun?</span>
                            <a href="{{ route('login') }}" class="fw-bold">Masuk</a>
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
                    url: "{{ route('register') }}",
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        $('#register').attr('disable', 'disabled');
                        $('#register').text('Proses...');
                    },
                    complete: function() {
                        $('#register').removeAttr('disable');
                        $('#register').text('Buat Akun');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.first_name) {
                                $('#first_name').addClass('is-invalid');
                                $('.errorFirstName').html(response.errors.first_name.join(
                                    '<br>'));
                            } else {
                                $('#first_name').removeClass('is-invalid');
                                $('.errorFirstName').html('');
                            }

                            if (response.errors.email) {
                                $('#email').addClass('is-invalid');
                                $('.errorEmail').html(response.errors.email.join('<br>'));
                            } else {
                                $('#email').removeClass('is-invalid');
                                $('.errorEmail').html('');
                            }

                            if (response.errors.telephone) {
                                $('#telephone').addClass('is-invalid');
                                $('.errorTelephone').html(response.errors.telephone.join(
                                    '<br>'));
                            } else {
                                $('#telephone').removeClass('is-invalid');
                                $('.errorTelephone').html('');
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
                                icon: 'success',
                                title: 'Sukses',
                                text: response.message,
                            }).then(function() {
                                top.location.href =
                                    "{{ route('login') }}";
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
