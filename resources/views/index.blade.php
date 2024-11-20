@extends('layouts.header')

@section('title', 'Home')
@section('content')
@if(session('success'))
    <script>
   Swal.fire({
    title: 'Sucesso!',
    text: "{{ session('success') }}",
    icon: 'success',
    confirmButtonText: 'OK',
    customClass: {
        popup: 'my-swal-popup',
        title: 'my-swal-title',
        text: 'my-swal-text',
        confirmButton: 'my-swal-button',
    }
});

</script>
@endif
            @if (session('tipo') === 'profissional')
                @include('layouts.homeProf')
            @else 
                @include('layouts.home')            
            @endif
           
@endsection
        
@section('footer')
@include('layouts.footer')
@endsection