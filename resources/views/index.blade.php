@extends('layouts.header')

@section('title', 'Home')
@section('content')
            @if (session('tipo') === 'profissional')
                @include('layouts.homeProf')
            @else 
                @include('layouts.home')            
            @endif
           
@endsection
        
@section('footer')
@include('layouts.footer')
@endsection