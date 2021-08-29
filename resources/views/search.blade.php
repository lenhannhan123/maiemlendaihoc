@extends('layouts.layoutuser.layout')
@section('Title', 'Search')
{{-- Css home --}}

<link rel="stylesheet" href="{{ asset('css/homepage.css') }} ">
<link rel="stylesheet" href="{{ asset('css/search.css') }} ">
<link rel="stylesheet" href="{{ asset('css/icon.css') }} ">

@section('content')

<div class="container">
  
    <div class="row">
        <div class="col-sm-3" id="filter">
            <x-searchfilter></x-searchfilter>

        </div>
        <div class="col-sm-9" id="list">
            <x-searchlist></x-searchlist>
        </div>

    </div>


</div>








<script>
    function advanced() {
        // document.getElementById('advanced').innerText
        console.log(document.getElementById('advanced').innerText);
        if (document.getElementById('advanced').innerText == "Nâng cao ") {
            document.getElementById('advanced').innerHTML = "Thu nhỏ  <i class='fas fa-angle-up'></i>"
            document.getElementById('form-advanced').style.display = "inline";
        } else {
            document.getElementById('advanced').innerHTML = "Nâng cao  <i class='fas fa-angle-down'></i>"
            document.getElementById('form-advanced').style.display = "none";
        }
    }
</script>


@endsection
