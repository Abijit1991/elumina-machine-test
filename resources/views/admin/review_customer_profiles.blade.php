@php
$title = 'Review Customer Profiles';
@endphp

@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>
                            <i class="fa-solid fa-bell"></i>
                            {{ __('Review Customer Profiles') }}
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-right">
                                        <a href="{{ route('admin.customer.profiles') }}"
                                            class="btn btn-info stretched-link text-white">
                                            <i class="fa-solid fa-eye"></i>
                                            View Customer Profiles
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
                                                    <th class="bg-warning text-center">Review Actions</th>
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
                                                        <td class="text-center">
                                                            @php
                                                                $link = 'admin.update.customer.profile.status';
                                                            @endphp

                                                            <a href="{{ route($link, ['custId' => $customer->id, 'statusId' => 2]) }}"
                                                                class="btn btn-success btn-sm">
                                                                <i class="fa-solid fa-circle-check"></i>
                                                                Approve
                                                            </a>
                                                            <a href="{{ route($link, ['custId' => $customer->id, 'statusId' => 4]) }}"
                                                                class="btn btn-danger btn-sm">
                                                                <i class="fa-solid fa-circle-xmark"></i>
                                                                Reject
                                                            </a>
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
    @endsection
