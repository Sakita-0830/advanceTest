@extends('layouts.parent')

@section('css')
<link rel="stylesheet" href="{{ asset('css/inquiry.css') }}">
@endsection

@section('content')
<h1 class="title">お問い合わせ</h1>
<!-- お問い合わせフォーム -->
<form action="/check" method="post" class="form h-adr">
  @csrf
  <input type="hidden" class="p-country-name" value="Japan">
  <!-- お名前 -->
  <div class="error_content_name">
    <div class="flex">
    @if ($errors->has('surname'))
      <div class="error_message_surname">{{$errors->first('surname')}}</div>
      @endif
    @if ($errors->has('name'))
      <div class="error_message_name">{{$errors->first('name')}}</div>
    @endif
    </div>
  </div>
  <label class="inquiry_label">
    <div class="inquiry_label_name">
      お名前<div class="inquiry_label_required">※</div>
    </div>
    <div class="inquiry_input_name">
      <div class="flex">
        <input type="text" name="surname" value="{{$inquiry["surname"]}}" class="inquiry_input_name_item">
        <input type="text" name="name" value="{{$inquiry["name"]}}" class="inquiry_input_name_item">
      </div>
    </div>
    <div class="inquiry_example_surname">例)山田</div>
    <div class="inquiry_example_name">例)太郎</div>
  </label>
  <!-- 性別 -->
  @if ($errors->has('sex'))
    <div class="error_message">{{$errors->first('sex')}}</div>
  @endif
  <label class="inquiry_label">
    <div class="inquiry_label_name">
      性別<div class="inquiry_label_required">※</div>
    </div>
    @if($inquiry["sex"] === "男性" )
    <div class="inquiry_input_sex">
      <input type="radio" name="sex" value="男性" class="inquiry_input_sex_item" checked>男性
    </div>
    <div class="inquiry_input_sex">
    <input type="radio" name="sex" value="女性" class="inquiry_input_sex_item">女性
    </div>
    @else
    <div class="inquiry_input_sex">
      <input type="radio" name="sex" value="男性" class="inquiry_input_sex_item">男性
    </div>
    <div class="inquiry_input_sex">
    <input type="radio" name="sex" value="女性" class="inquiry_input_sex_item" checked>女性
    </div>
    @endif
  </label>
  <!-- メールアドレス -->
  @if ($errors->has('email'))
    <div class="error_message">{{$errors->first('email')}}</div>
  @endif
  <label class="inquiry_label">
    <div class="inquiry_label_name">
      メールアドレス<div class="inquiry_label_required">※</div>
    </div>
    <input type="email" name="email" value="{{$inquiry["email"]}}" class="inquiry_input">
    <div class="inquiry_example">例)test@example.com</div>
  </label>
  <!-- 郵便番号-->
  @if ($errors->has('post'))
    <div class="error_message_post">{{$errors->first('post')}}</div>
  @endif
  <label class="inquiry_label">
    <div class="inquiry_label_name">
      郵便番号<div class="inquiry_label_required">※</div>
    </div>
    <div class="inquiry_input_post">
      <div class="flex">
        <div class="inquiry_post_mark">〒</div>
        <!-- 郵便番号入力 -->
        <input type="text" name="post" value="{{$inquiry["post"]}}" class="inquiry_input_post_item p-postal-code">
      </div>
    </div>
    <div class="inquiry_example">例) 123-4567</div>
  </label>
  <!-- 住所 -->
  @if ($errors->has('address'))
    <div class="error_message">{{$errors->first('address')}}</div>
  @endif
  <label class="inquiry_label">
    <div class="inquiry_label_name">
      住所<div class="inquiry_label_required">※</div>
    </div>
    <!-- 住所入力 -->
    <input type="text" name="address" value="{{$inquiry["address"]}}" class="inquiry_input p-region p-locality p-street-address p-extended-address">
    <div class="inquiry_example">例)東京都渋谷区千駄ヶ谷1-2-3</div>
  </label>
  <!-- 建物名 -->
  @if ($errors->has('building'))
    <div class="error_message">{{$errors->first('building')}}</div>
  @endif
  <label class="inquiry_label">
    <div class="inquiry_label_name">
      建物名
    </div>
    <input type="text" name="building" value="{{$inquiry["building"]}}" class="inquiry_input">
    <div class="inquiry_example">例)千駄ヶ谷マンション101</div>
  </label>
  <!-- ご意見 -->
  @if ($errors->has('opinion'))
    <div class="error_message">{{$errors->first('opinion')}}</div>
  @endif
  <label class="inquiry_label">
    <div class="inquiry_label_name_opinion">
      ご意見<div class="inquiry_label_required">※</div>
    </div>
    <textarea name="opinion" cols="30" rows="4" class="inquiry_input_opinion">{{$inquiry["opinion"]}}</textarea>
  </label>
  <!-- 確認ボタン -->
  <input type="submit" value="確認" class="buttom">
</form>
@endsection