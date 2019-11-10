<!DOCTYPE html>
<html lang="en">
<head>
    @section('meta_tags')
        @include('layouts.meta')
    @show
    <meta name="baseurl" content="{{ url('/') }}">
    @auth
        <meta name="userID" content="{{ auth()->user()->id }}">
    @endauth
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ueibi - Welcome To Ueibi</title>

    @section('style')
        @include('layouts.style')
    @show
    @yield('css')
 </head>
 <!-- class="{{$page}}" -->
<body class="{{$page}}" style="background-image:url('/images/cover.jpg');background-size:cover;font-family: 'Roboto', sans-serif;background-attachment:fixed;">
    <!-- <div id="san-loader">
        <img src="/images/loader.png" alt="Loader..">
    </div> -->
    <div class="container">
        <form action="{{url('admin/logout')}}" method="POST" id="logout_id">
             @csrf
        </form>
        <div class="black_bg">
            <div class="top_header plr_50">
               <img src="/images/logo.png" class="logo">
               <label class="white">{{auth()->user()->name}}
                <img src="/images/close.png" class="close_img" onclick="jQuery('#logout_id').submit();">
               </label>
           </div>
           <div class="black_bg_inner plr_40">
               @include('layouts.topbar')
               @yield('content')
               @include('layouts.footer')
           </div>
        </div>
    </div>
    @include('modals')
    @section('scripts')
        @include('layouts.scripts')
    @show
    @if(session()->has('message'))
      <script type="text/javascript">
        swal("","{{ session()->get('message') }}", "{{ session()->get('alert-class') }}");
      </script>
      @php(session()->forget('message'))
      @php(session()->forget('alert-type'))
    @endif
    @yield('javascript')
</body>
</html>
