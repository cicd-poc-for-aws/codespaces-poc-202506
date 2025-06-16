@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8 mx-auto">
        <h1 class="m-3">会社詳細情報</h1>
        <div class="row">
            <form action="{{ route('corpRegister.edit',['corp_id' => $corp->corp_id]) }}" method="GET">
                <input type="submit" class="btn btn-primary mt-4 mx-auto" value="修正" style="position: fixed; top: 80px; right: 420px; z-index: 9999;">
            </form>
        </div>
        <table class="table table-bordered mt-4">
            <tr>
                <th class="table-secondary col-sm-4">会社ID</th>
                <td class="col-sm-8">{{ $corp->corp_id }}</td>
            </tr>
            <tr>
                <th class="table-secondary col-sm-4">会社名</th>
                <td class="col-sm-8">{{ $corp->corp_name }}</td>
            </tr>
            <tr>
                <th class="table-secondary col-sm-4">電話番号</th>
                <td class="col-sm-8">{{ $corp->tel }}</td>
            </tr>
            <tr>
                <th class="table-secondary col-sm-4">作成日</th>
                <td class="col-sm-8">{{ $corp->created_at }}</td>
            </tr>
            <tr>
                <th class="table-secondary">更新日</th>
                <td>{{ $corp->updated_at }}</td>
            </tr>
        </table>
        <div class="mt-5 d-flex justify-content-center">
            <form method="GET" action="{{ route('corpList') }}">
                <button type="submit" class="btn btn-secondary">戻る</button>
            </form>
        </div>
    </div>
</div>
@endsection
