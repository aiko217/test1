@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
  <div class="confirm__heading">
    <h2>Confirm</h2>
  </div>
  <form class="form" action="/contacts" method="post">
    @csrf
    <div class="confirm-table">
      <table class="confirm-table__inner">
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お名前</th>
          <td class="confirm-table__text">
          <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly />
          <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td class="confirm-table__text">
            <input type="text" value="{{ $contact['gender_text'] }}" readonly>
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td class="confirm-table__text">
            <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">電話番号</th>
          <td class="confirm-table__text">
            <input type="text" name="tel" value="{{ $contact['tel'] }}" readonly />
            <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
            <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
            <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td class="confirm-table__text">
            <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">建物名</th>
          <td class="confirm-table__text">
            <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせの種類</th>
          <td class="confirm-table__text">
            {{ $contact['category_text'] }}
            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ内容</th>
          <td class="confirm-table__text">
            <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
          </td>
        </tr>
      </table>
    </div>
    <div class="form__button-wrapper">
    <div class="form__button">
      <button class="form__button-submit" type="submit" name="action" value="send">送信</button>
    </div>
    <div class="form__button">
      <button class="form__button-link" type="submit" name="action" value="back">修正</button>
    </div>
    </div>
  </form>
</div>
@endsection
