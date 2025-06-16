@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="m-3">{{ $corp ? '会社更新' : '会社登録' }}</h1>
    <form  method="POST" action="{{ $corp ? route('corpRegister.edit', ['corp_id' => $corp->corp_id]) : route('corpRegister') }}">
        @csrf
        @if ($corp)
            @method('PUT')
        @endif
        <table class="table">
        <tr>
            <th class="text _small _th-top">会社名<span class="label-required"><span style="color: red; font-size: 0.8em;">※必須</span></span></th>
            <td>
            <div class="form_input">
                <input type="text" name="corp_name" value="{{ old('corp_name',$corp->corp_name ?? '') }}" maxlength="60">
            </div>
            </td>
        </tr>

            <tr>
                <th class="text _small _th-top">郵便番号<span class="label-required"><span style="color: red; font-size: 0.8em;">※必須</span></span></th>
                <td>
                    <div class="form_input">
                        <input type="text" name="zip_code" value="{{ old('zip_code',$corp->zip_code ?? '') }}" maxlength="60">
                    </div>
                </td>
            </tr>
            <tr>
                <th class="text _small _th-top">都道府県<span class="label-required"><span style="color: red; font-size: 0.8em;">※必須</span></span></th>
                <td>
                    <div class="form_input">
                        <input type="text" name="prefecture" value="{{ old('prefecture',$corp->prefecture ?? '') }}" maxlength="60">
                    </div>
                </td>
            </tr>
            <tr>
                <th class="text _small _th-top">住所1<span class="label-required"><span style="color: red; font-size: 0.8em;">※必須</span></span></th>
                <td>
                    <div class="form_input">
                        <input type="text" name="address1" value="{{ old('address',$corp->address1 ?? '') }}" maxlength="60">
                    </div>
                </td>
            </tr>
            <tr>
                <th class="text _small _th-top">住所2(建物名等)<span class="label-required"></span></th>
                <td>
                    <div class="form_input">
                        <input type="text" name="address2" value="{{ old('address',$corp->address2 ?? '') }}" maxlength="60">
                    </div>
                </td>
            </tr>
            <tr>
                <th class="text _small _th-top">電話番号<span class="label-required"><span style="color: red; font-size: 0.8em;">※必須</span></span></th>
                <td>
                    <div class="form_input">
                        <input type="text" name="tel" value="{{ old('tel',$corp->tel ?? '') }}" maxlength="60">
                    </div>
                </td>
            </tr>
            <tr>
                <th class="text _small _th-top">備考<span class="label-required"></span></th>
                <td>
                    <div class="form_input">
                        <input type="text" name="memo" value="{{ old('memo',$corp->memo ?? '') }}" maxlength="1000">
                    </div>
                </td>
            </tr>
        </table>
        <div class="row">
            <input type="submit" class="btn btn-primary mt-4 mx-auto" value="{{ $corp ? '更新' : '登録' }}">
        </div>
    </form>
    <form method="GET" action="{{ route('corpList') }}">
        <button type="submit" class="btn btn-secondary mt-4 mx-auto">戻る</button>
    </form>
</div>
@endsection
