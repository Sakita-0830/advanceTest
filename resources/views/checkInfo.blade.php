@extends('layouts.parent')

@section('css')
<link rel="stylesheet" href="{{ asset('css/check.css') }}">
@endsection

@section('content')
<h1 class="title">内容確認</h1>
<!-- お問い合わせフォーム -->
<form action="/store" method="POST" class="form">
@csrf
  <table>
    <tr>
      <th class="check_table_th">お名前</th>
      <td class="check_table_td">
        <input type="hidden" name="surname" value={{$inquiry["surname"]}}>
        <input type="hidden" name="name" value={{$inquiry["name"]}}>
        <div  class="check_table_td-name">{{$inquiry["surname"]}}</div>
        <div class="check_table_td-name"> {{$inquiry["name"]}}</div>
      </td>
    </tr>
    <tr>
      <th class="check_table_th">性別</th>
      <td class="check_table_td">
        <input type="hidden" name="sex" value={{$inquiry["sex"]}}>
        <div>{{$inquiry["sex"]}}</div>
      </td>
    </tr>
    <tr>
      <th class="check_table_th">メールアドレス</th>
      <td class="check_table_td">
        <input type="hidden" name="email" value={{$inquiry["email"]}}>
        <div>{{$inquiry["email"]}}</div>
      </td>
    </tr>
    <tr>
      <th class="check_table_th">郵便番号</th>
      <td class="check_table_td">
        <input type="hidden" name="post" value={{$inquiry["post"]}}>
        <div>{{$inquiry["post"]}}</div>
      </td>
    </tr>
    <tr>
      <th class="check_table_th">住所</th>
      <td class="check_table_td">
        <input type="hidden" name="address" value={{$inquiry["address"]}}>
        <div>{{$inquiry["address"]}}</div>
      </td>
    </tr>
    <tr>
      <th class="check_table_th">建物名</th>
      <td class="check_table_td">
        <input type="hidden" name="building" value={{$inquiry["building"]}}>
        <div>{{$inquiry["building"]}}</div>
      </td>
    </tr>
    <tr>
      <th class="check_table_th">ご意見</th>
      <td class="check_table_td">
        <input type="hidden" name="opinion" value={{$inquiry["opinion"]}}>
        <div>{{$inquiry["opinion"]}}</div>
      </td>
    </tr>
  </table>
  <!-- 画面遷移ボタン -->
  <input type="submit" value="送信" class="buttom">
  <u><input type="submit" formaction="/correction" value="修正する" class="correction"></u>
</form>
@endsection