@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('button')
<form action="{{ route('logout') }}" method="POST">
  @csrf
  <button class="header__button">logout</button>
</form>
@endsection

@section('content')
<div class="admin-container">
  <h2 class="admin-title">Admin</h2>

  <form action="{{ route('admin.search') }}" method="GET" class="search-form">
    <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" />
    <select name="gender">
      <option value="">性別</option>
      <option value="1">男性</option>
      <option value="2">女性</option>
    </select>
    <select name="category">
      <option value="">お問い合わせの種類</option>
    </select>
    <input type="date" name="date" />
    <button type="submit" class="btn-search">検索</button>
    <a href="{{ route('admin.reset') }}" class="btn-reset">リセット</a>
  </form>

  <button class="btn-export">エクスポート</button>

  <table class="admin-table">
    <thead>
      <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせ内容</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($contacts as $contact)
      <tr>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->gender_label }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->detail }}</td>
        
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="pagination">
    {{ $contacts->links() }}
  </div>
</div>
@endsection



