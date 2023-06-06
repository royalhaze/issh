@extends('panel.partials.main')

@section('content')
    <!-- Content -->
    <keep-alive>
        <router-view></router-view>
    </keep-alive>
    <!-- / Content -->
@endsection
@section('script')
    <script src="{{asset('js/app.js')}}"></script>
@endsection
