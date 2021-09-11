@extends('layouts.layoutuser.layout')
@section('Title', 'Blog')
{{-- Css home --}}

<link rel="stylesheet" href="{{ asset('css/homepage.css') }} ">


@section('content')
<div class="container">
    <div class="m-container">
        <br>
        <br>
        <br>
        <br>
        <br><br>
        <h5 class="blog-title" style="font-weight: bold; color: #17a2b8">"The more that you read, the more things you will know. The more that you learn, the more places you'll go."</h5>
    </div>
    <div class="row">

        @foreach ($data as $row)
            <div class="col-md-6">

                <br>
                <br>
                <br>
                <img src="{{ asset("images/blog/$row->thumbnail") }}" alt="" style="width: 100%">

                <h6 style="margin-top: 10px">{{ $row->title }}</h6>

                <p>{!! $row->content !!}</p>  

            </div>

        @endforeach
        <div class="pagination-block" style="float: right; padding-right: 24px">
            {{ $data->links('admin-school-majors.layoutpaginationlinks') }}
        </div>
    </div>
@endsection