<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('css/main.css')}}">
<link rel="stylesheet" href="{{ asset('css/YouTubePopUp.css')}}">
<link rel="stylesheet" href="{{ asset('css/jquery.fancybox-1.3.4.css')}}">
<link href="{{ asset('css/bootstrap4-toggle.min.css')}}" rel="stylesheet">
<link href="{{ asset('css/datepicker.css')}}" rel="stylesheet">
<link href="{{ asset('css/bootstrap-select.min.css')}}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link href="{{ asset('css/chat.css')}}" rel="stylesheet">
<script src="{{ asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{ asset('js/YouTubePopUp.jquery.js')}}"></script>
<script src="{{ asset('js/jquery.fancybox-1.3.4.pack.js')}}"></script>
<script src="{{ asset('js/popper.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/bootstrap4-toggle.min.js')}}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('js/bootstrap-datepicker.he.js')}}"></script>
<script src="{{ asset('js/bootstrap-select.min.js')}}"></script>
<script src="https://use.fontawesome.com/f39b0f5b21.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('js/main.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
@if(is_edit_mode())
<link href="{{ asset('css/editable_areas.css') }}" rel="stylesheet">
@endif
@stack('scripts')
  @if(is_edit_mode())
    @include('layouts.parts.editable_area_modal')
    <script src="{{asset('js/bootstrap/util.js')}}"></script>
    <script src="{{asset('js/bootstrap/modal.js')}}"></script>
    <script src="{{asset('packages/sleepingowl/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('js/editable_area.js')}}"></script>
  @endif
