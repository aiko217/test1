@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks__content">
    <h1 class="thanks-message">Thank you</h1>
</div>
  <div class="thanks__heading">
    <h2>お問い合わせありがとうございました</h2>
    <form class="form" action="/" method="get">
      <button class="form__button-submit" type="submit">HOME</button>
    </form>
  </div>
</div>
@endsection
