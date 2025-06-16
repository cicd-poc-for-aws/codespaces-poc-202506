@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8 mx-auto">
        <h1 class="m-3">ユーザ詳細情報</h1>
        <table class="table table-bordered mt-4">
            <tr>
                <th class="table-secondary col-sm-4">Id</th>
                <td class="col-sm-8">{{ $user_detail->id }}</td>
            </tr>
            <tr>
                <th class="table-secondary col-sm-4">ユーザ名</th>
                <td class="col-sm-8">{{ $user_detail->name }}</td>
            </tr>
            <tr>
                <th class="table-secondary col-sm-4">メールアドレス</th>
                <td class="col-sm-8">{{ $user_detail->email }}</td>
            </tr>
            <tr>
                <th class="table-secondary col-sm-4">作成日</th>
                <td class="col-sm-8">{{ $user_detail->created_at }}</td>
            </tr>
            <tr>
                <th class="table-secondary">更新日</th>
                <td>{{ $user_detail->updated_at }}</td>
            </tr>
        </table>
        <div class="mt-5 d-flex justify-content-center">
            <form method="GET" action="{{ route('menu') }}">
                <button type="submit" class="btn btn-secondary">戻る</button>
            </form>
        </div>
    </div>
</div>
@endsection
