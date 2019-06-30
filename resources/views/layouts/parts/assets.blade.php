<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('css/main.css')}}">
<link rel="stylesheet" href="{{ asset('css/YouTubePopUp.css')}}">
<link rel="stylesheet" href="{{ asset('css/jquery.fancybox-1.3.4.css')}}">
<link href="{{ asset('css/bootstrap4-toggle.min.css')}}" rel="stylesheet">
<link href="{{ asset('css/datepicker.css')}}" rel="stylesheet">
<link href="{{ asset('css/bootstrap-select.min.css')}}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
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
