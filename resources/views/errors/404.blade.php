@if(Auth::user())
  @php ($page = 'layouts.base')
@else
  @php ($page = 'layouts.front')
@endif
@extends($page)
@section('title', "Laman Tidak Ditemukan")

@section('css')
<style media="screen">
  .message{
    width: 100%;
    padding: 20px 20%;
    margin: 0 auto;
  }
  .ilus{
    margin: 0 auto;
    max-width: 100%;
  }
  h3{
    text-align: center;
  }
</style>
@endsection

@section('content')
<div class="message">
  <object type="image/svg+xml" data="{{asset('image/404.svg')}}" class="ilus">
    404
  </object>
  <h3>Maaf, laman yang anda cari tidak ditemukan!</h3>
</div>
@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function(){
     $(".home-banner").hide();
});
</script>
@endsection
