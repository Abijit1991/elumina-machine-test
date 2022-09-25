@php
$title = 'Admin Customers Profile Page';
@endphp

@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>
                            <i class="fa-solid fa-bell"></i>
                            {{ __('Customer Profiles') }}
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-right">
                                        <a href="{{ route('admin.review.customer.profiles') }}"
                                            class="btn btn-danger stretched-link">
                                            <i class="fa-solid fa-list-check"></i>
                                            Review Customer Profiles
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-condensed table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="bg-warning text-center">S.No.</th>
                                                    <th class="bg-warning text-center">First Name</th>
                                                    <th class="bg-warning text-center">Last Name</th>
                                                    <th class="bg-warning text-center">Date of Birth</th>
                                                    <th class="bg-warning text-center">E-Mail Address</th>
                                                    <th class="bg-warning text-center">Profile Status</th>
                                                    <th class="bg-warning text-center">Registration Date</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php $sno = 1 @endphp
                                                @foreach ($customers as $customer)
                                                    <tr>
                                                        <td class="font-weight-bold text-primary text-center">
                                                            {{ $sno }}
                                                            @php
                                                                $sno++;
                                                            @endphp
                                                        </td>
                                                        <td class="font-weight-bold text-primary">
                                                            {{ $customer->first_name }}
                                                        </td>
                                                        <td class="font-weight-bold text-primary">
                                                            {{ $customer->last_name }}
                                                        </td>
                                                        <td class="font-weight-bold text-primary text-center">
                                                            {{ $customer->birth_date->format('d-m-Y') }}
                                                        </td>
                                                        <td class="font-weight-bold text-primary">
                                                            {{ $customer->email_address }}
                                                        </td>
                                                        <td class="text-center">
                                                            <h4>
                                                                <span
                                                                    class="badge badge-pill badge-{{ $customer->status->class }}">
                                                                    {{ $customer->status->status }}
                                                                </span>
                                                            </h4>
                                                        </td>
                                                        <td class="font-weight-bold text-primary text-center">
                                                            {{ $customer->created_at->format('d-m-Y') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
