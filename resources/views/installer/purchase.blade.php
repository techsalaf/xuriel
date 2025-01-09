@extends('installer.app')
@section('content')
@php
$enabled=true;
function generateRandomCode() {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	$code = '';

	for ($i = 0; $i < 36; $i++) {
		if (in_array($i, [8, 13, 18, 23])) {
			$code .= '-';
		} else {
			$code .= $characters[rand(0, strlen($characters) - 1)];
		}
	}

	return $code;
}

$randomCode = generateRandomCode();
@endphp
<div class="col-sm-12">
   <h3 class="text-center">🔑 {{ __('Lets verify the purchase key') }}</h3>
   @if(Session::has('purchase-key-error'))
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <span class="alert-icon"><i class="fi fi-rs-triangle-warning"></i></span>
      <span class="alert-text"><strong>{{ __('Opps') }}</strong> {{ Session::get('purchase-key-error') }}</span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true" class="text-danger">×</span>
      </button>
   </div>
   @endif

   <form class="ajaxform_instant_reload" method="post" action="{{ route('install.verify') }}">
      @csrf
      <div class="form-group mt-5">
         <input type="text" name="purchase_key" class="form-control" value="{{ $randomCode }}">
      </div>
      <button class="btn btn-outline-primary mt-1 submit-btn">
      <span class="mb-1">{{ __('Verify & Next') }}</span> 
      <i class="fi  fi-rs-angle-right text-right mt-5"></i>
      </button>
   </form>
   
</div>
<div class="clear"></div>
<br>   
@endsection
