@extends('layouts.app')

@section('content')
<div class="container">
        {{-- メニュー --}}
        <div class="container">
        <h1>メニュー</h1>
        <ul class="menu">
            <li><a href="{{ route('corpList') }}">会社一覧</a></li>
            <li><a href="{{ route('corpRegister') }}">会社登録</a></li>
        </ul>
    </div>
        <h1 class="m-3">ユーザ一覧</h1>
        {{-- 検索ボックス --}}
        <form method="GET" class="card form-group" action="{{ route('menu/search') }}">
            <div class="card-header">
                ユーザ検索
            </div>
            <div class="card-body">
                <div class="row">
                    <label class="col-sm-2">ユーザ名</label>
                    <input type="text" name="keyword" class="col-sm-10 form-control" value="{{ $keyword }}" placeholder="ユーザ名を入力してください" maxlength="20">
                </div>
                <div class="row ">
                    <input type="submit" class="btn btn-primary mt-4 mx-auto" value="検索">
                </div>
            </div>
        </form>
        {{-- ページネーション --}}
        <div class="mt-5">
            @if ($users->lastPage() > 1)
                <ul class="pagination justify-content-end">
                    {{-- 最初へ --}}
                    <li class="page-item {{ ($users->currentPage() == 1) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $users->url(1) }}">
                            <span aria-hidden="true"> << </span>
                        </a>
                    </li>
                    {{-- 前へ --}}
                    <li class="page-item {{ ($users->currentPage() == 1) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $users->url(1) }}">
                            <span aria-hidden="true"> < </span>
                        </a>
                    </li>
                    {{-- ページ番号 --}}
                    @for ($i = 1; $i <= $users->lastPage(); $i++)
                        <li class="page-item {{ ($users->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    {{-- 次へ --}}
                    <li class="page-item {{ ($users->currentPage() == $users->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $users->url($users->currentPage()+1) }}" >
                            <span aria-hidden="true"> > </span>
                        </a>
                    </li>
                    {{-- 最後へ --}}
                    <li class="page-item {{ ($users->currentPage() == $users->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $users->url($users->lastPage()) }}">
                        <span aria-hidden="true"> >> </span>
                        </a>
                    </li>
                </ul>
            @endif
        </div>
        {{-- ユーザ一覧 --}}
        <div class="mt-2">
            @if(count($users) === 0)
                <p>{{ __('labels.menu.NoResultsFound') }}</p>
            @endif
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">ユーザ名</th>
                        <th scope="col">メールアドレス</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @isset($users)
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form method="GET" action="{{ route('userDetail') }}">
                                        <button type="submit" name="detail" class="btn btn-primary" value="{{ $user->id }}">詳細</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
</div>
@endsection
