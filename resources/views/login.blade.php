@extends('layout')
@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    LOGIN FORM
                </div>
                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input id="username" name="username" type="text" class="form-control"
                                value="{{ old('username') ?: session('username') }}" placeholder="Enter your username">
                                @error('username')
                                    <span class="error-message" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input id="password" name="password" type="password" class="form-control">
                                @error('password')
                                    <span class="error-message" style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button type="submit" class="btn btn-outline-primary">LOGIN</button>
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <p><a href="{{ route('register') }}"
                                            class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Register
                                            Now</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
    @endsection

    @push('style')
        <style>
            body {
                background: #222d32;
                font-family: "Roboto", sans-serif;
            }

            .form-control:focus {
                border-color: inherit;
                -webkit-box-shadow: none;
                box-shadow: none;
                border-bottom: 2px solid #0db8de;
                outline: 0;
                background-color: #1a2226;
                color: #ecf0f5;
            }

            input:focus {
                outline: none;
                box-shadow: 0 0 0;
            }
        </style>
    @endpush

    @push('script')
        <script>
            window.addEventListener("load", (event) => {
                initializeInputFields();
                document.getElementById('username').focus();
            });
        </script>
    @endpush
