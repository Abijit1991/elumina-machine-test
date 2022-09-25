@php
$title = 'Admin Home Page';
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
                            {{ __('Notifications') }}
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h4 class="card-title">
                                                Review Customer Profile -
                                                <span class="badge badge-danger"> {{ $customersReviewCount }}</span>
                                            </h4>
                                            <a href="{{ route('admin.review.customer.profiles') }}"
                                                class="btn btn-danger stretched-link">
                                                <i class="fa-solid fa-list-check"></i>
                                                Review Customer Profiles
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h4 class="card-title">
                                                Review Customer Profile -
                                                <span class="badge badge-info text-white"> {{ $customersCount }}</span>
                                            </h4>
                                            <a href="{{ route('admin.customer.profiles') }}"
                                                class="btn btn-info stretched-link text-white">
                                                <i class="fa-solid fa-eye"></i>
                                                View Customer Profiles
                                            </a>
                                        </div>
                                    </div>
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
