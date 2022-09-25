@php
$title = 'Customer Dashboard Page';
@endphp
@extends('layouts.register')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-user-alt"></i>
                        {{ __('Customer Profile Information') }}
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed table-hover">
                                <tr>
                                    <td>First Name</td>
                                    <td class="font-weight-bold text-primary">{{ $customer->first_name }}</td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td class="font-weight-bold text-primary">{{ $customer->last_name }}</td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td class="font-weight-bold text-primary">
                                        {{ $customer->birth_date->format('d-m-Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>E-Mail Address</td>
                                    <td class="font-weight-bold text-primary">{{ $customer->email_address }}</td>
                                </tr>
                                <tr>
                                    <td>Profile Status</td>
                                    <td>
                                        <h4>
                                            <span class="badge badge-pill badge-{{ $customer->status->class }}">
                                                {{ $customer->status->status }}
                                            </span>
                                        </h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Registration Date</td>
                                    <td class="font-weight-bold text-primary">
                                        {{ $customer->created_at->format('d-m-Y') }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
