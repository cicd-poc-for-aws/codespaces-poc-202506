@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
        <div class="col-md-8 mx-auto">
            <h1 class="m-3">{{ __('labels.userMaster.Title') }}</h1>
            {{-- ユーザ新規追加 --}}
            <form action="{{ route('userMaster') }}" method="post" enctype="multipart/form-data" class="card">
                @csrf
                <div class="card-header">
                    ユーザ新規追加
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>名前</th>
                                    <th>メールアドレス</th>
                                    <th>パスワード</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="name" value="{{ old('name') }}" class="form-control"></td>
                                    <td><input type="email" name="email" value="{{ old('email') }}" min="1" max="1000" class="form-control"></td>
                                    <td><input type="password" name="password" value="{{ old('password') }}" min="0" max="100" class="form-control"></td>
                                    <td class="buttun-area">
                                        <input type="submit" class="btn btn-primary" name="insert_user" value="登録">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
            {{-- 再読込ボタン --}}
            <div class="mt-5 d-flex justify-content-start">
                <input type="button" class="btn btn-outline-dark" onclick="location.href='{{ route('userMaster') }}'" value="再読込">
            </div>
            {{-- ユーザテーブル情報 --}}
            <div class="mt-3">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">名前</th>
                                <th scope="col">メールアドレス</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @if (isset($user_list))
                            @foreach ($user_list as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="buttun-area">
                                        <form action="{{ route('userEdit') }}" method="GET" enctype="multipart/form-data">
                                            <button type="submit" class="btn btn-success" name="update_user" value="{{ $user->id }}">編集</button>
                                        </form>
                                    </td>
                                    <td class="buttun-area">
                                        <form action="{{ route('userMaster') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <button type="submit" class="btn btn-secondary" name="delete_user" value="{{ $user->id }}" onclick="return confirm('削除してよろしいですか?')">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
