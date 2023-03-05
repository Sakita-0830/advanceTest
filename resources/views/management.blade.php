@extends('layouts.parent')

@section('css')
<link rel="stylesheet" href="{{ asset('css/management.css') }}">
@endsection

@section('content')
<h1 class="title">管理システム</h1>
<!-- 検索部分 -->
<form action="/search" method="get" class="form">
  <!-- お名前 -->
  <label class="management_label">
    <div class="management_label_name">お名前</div>
    <input type="text" name="name" class="management_input_item">
  </label>
  <!-- 性別 -->
  <label class="management_label">
    <div class="management_label_name_sex">性別</div>
    <div class="management_input_sex">
      <input type="radio" name="sex" value="全て" class="management_input_sex_item" checked>全て
    </div>
    <div class="management_input_sex">
      <input type="radio" name="sex" value="男性" class="management_input_sex_item">男性
    </div>
    <div class="management_input_sex">
    <input type="radio" name="sex" value="女性" class="management_input_sex_item">女性
    </div>
  </label>
  <!-- 登録日 -->
  <label class="management_label_created">
    <div class="management_label_name">登録日</div>
    <input type="datetime-local" name="created_at_after" class="management_input_item">
    <div class="management_created_item">～</div>
    <input type="datetime-local" name="created_at_before" class="management_input_item">
  </label>
  <!-- メールアドレス -->
  <label class="management_label">
    <div class="management_label_name">メールアドレス</div>
    <input type="text" name="email" class="management_input_item">
  </label>
  <!-- submitボタン -->
  <input type="submit" value="検索" class="buttom">
  <a href="/management" class="management_reset">リセット</a>
</form>

<!-- 検索結果 -->
{{ $data->links('pagination::tailwind') }}
<table>
  <tr>
    <th class="table_th_id">ID</th>
    <th class="table_th_name">お名前</th>
    <th class="table_th_sex">性別</th>
    <th class="table_th_email">メールアドレス</th>
    <th class="table_th_opinion">ご意見</th>
  </tr>
  @foreach($data as $datas)
  <tr>
    <td class="table_td_id">{{$datas->id}}</td>
    <td class="table_td_name">{{$datas->surname. " ". $datas->name}}</td>
    <td class="table_td_sex">{{$datas->sex}}</td>
    <td class="table_td_email">{{$datas->email}}</td>
    <td class="table_td_opinion">
      <div>{{Str::limit($datas->opinion, 50, '...')}}</div>
      <div>{{$datas->opinion}}</div>
    </td>
    <td>
      <form action="/delete" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$datas->id}}">
        <input type="submit" value="削除" class="table_td_button">
      </form>
    </td>
  </tr>
  @endforeach
</table>
@endsection