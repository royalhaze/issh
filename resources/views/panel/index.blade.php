@extends('panel.partials.main')

@section('content')
    <!-- Content -->
    <router-view></router-view>
    <!-- / Content -->
@endsection
@section('script')
    <script src="{{asset('js/app.js')}}"></script>
@endsection
