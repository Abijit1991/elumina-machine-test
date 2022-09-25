@php
$title = 'Customer Registration Form Page';
@endphp
@extends('layouts.register')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-user-alt"></i>
                        {{ __('Customer Registration Form') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('customer.create') }}" onsubmit="return validateForm()">
                            @csrf

                            <div class="form-group row">
                                <label for="first_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                        value="{{ old('first_name') }}" autocomplete="first_name" autofocus
                                        placeholder="First Name">

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                        value="{{ old('last_name') }}" autocomplete="last_name" autofocus
                                        placeholder="Last Name">

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birth_date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                                <div class="col-md-6">
                                    <input id="birth_date" type="text"
                                        class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                                        value="{{ old('birth_date') }}" autocomplete="birth_date" placeholder="Select Date"
                                        readonly>

                                    <script>
                                        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
                                        $('#birth_date').datepicker({
                                            uiLibrary: 'bootstrap4',
                                            format: 'dd-mm-yyyy',
                                            maxDate: today
                                        });
                                    </script>

                                    @error('birth_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email_address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email_address" type="email"
                                        class="form-control @error('email_address') is-invalid @enderror"
                                        name="email_address" value="{{ old('email_address') }}"
                                        autocomplete="email_address" placeholder="E-Mail Address">

                                    @error('email_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirmation"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password"
                                        placeholder="Confirm Password">
                                </div>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="far fa-save"></i>
                                        {{ __('Register') }}
                                    </button>
                                    <button type="reset" class="btn btn-danger">
                                        <i class="fas fa-window-close"></i>
                                        {{ __('Cancel') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {});

        function validateForm() {
            var formFields = [{
                field: "first_name",
                message: "First Name"
            }, {
                field: "last_name",
                message: "Last Name"
            }, {
                field: "birth_date",
                message: "Date of Birth"
            }, {
                field: "email_address",
                message: "E-Mail Address"
            }, {
                field: "password",
                message: "Password"
            }, {
                field: "password_confirmation",
                message: "Confirm Password"
            }];

            var returnValue = 0;

            $.each(formFields, function(key, value) {
                if (!$('#' + value.field).val()) {
                    displayErrorMessage(value.message);
                    returnValue++;
                    return false;
                }
            });

            function displayErrorMessage(message) {
                swal("Error Occured!", "Please enter your " + message, "error");
            }

            return (returnValue == 0 ? true : false)
        }
    </script>
@endsection
