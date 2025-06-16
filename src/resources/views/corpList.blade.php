@extends('layouts.app')

@section('content')
<div class="container">
        <h1 class="m-3">会社一覧</h1>
        <div class="row">
            <form action="/corpRegister" method="GET">
                <input type="submit" class="btn btn-primary mt-4 mx-auto" value="+新規登録" style="position: fixed; top: 80px; right: 210px; z-index: 9999;">
            </form>
        </div>
        {{-- 検索ボックス --}}
        <form method="GET" class="card form-group" action="{{ route('corpList/search') }}">
            <div class="card-header">
                会社検索
            </div>
            <div class="card-body">
                <div class="row">
                    <label class="col-sm-2">会社名</label>
                    <input type="text" name="keyword" class="col-sm-10 form-control" value="{{ $keyword }}" placeholder="会社名を入力してください" maxlength="20">
                </div>
                <div class="row ">
                    <input type="submit" class="btn btn-primary mt-4 mx-auto" value="検索">
                </div>
            </div>
        </form>
        {{-- ページネーション --}}
        <div class="mt-5">
            @if ($corps->lastPage() > 1)
                <ul class="pagination justify-content-end">
                    {{-- 最初へ --}}
                    <li class="page-item {{ ($corps->currentPage() == 1) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $corps->url(1) }}">
                            <span aria-hidden="true"> << </span>
                        </a>
                    </li>
                    {{-- 前へ --}}
                    <li class="page-item {{ ($corps->currentPage() == 1) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $corps->url(1) }}">
                            <span aria-hidden="true"> < </span>
                        </a>
                    </li>
                    {{-- ページ番号 --}}
                    @for ($i = 1; $i <= $corps->lastPage(); $i++)
                        <li class="page-item {{ ($corps->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $corps->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    {{-- 次へ --}}
                    <li class="page-item {{ ($corps->currentPage() == $corps->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $corps->url($corps->currentPage()+1) }}" >
                            <span aria-hidden="true"> > </span>
                        </a>
                    </li>
                    {{-- 最後へ --}}
                    <li class="page-item {{ ($corps->currentPage() == $corps->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $corps->url($corps->lastPage()) }}">
                        <span aria-hidden="true"> >> </span>
                        </a>
                    </li>
                </ul>
            @endif
        </div>
        {{-- 会社一覧 --}}
        <div class="mt-2">
            @if(count($corps) === 0)
                <p>{{ __('labels.menu.NoResultsFound') }}</p>
            @endif
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">会社ID</th>
                        <th scope="col">会社名</th>
                        <th scope="col">電話番号</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @isset($corps)
                        @foreach($corps as $corp)
                            <tr>
                                <td>{{ $corp->corp_id }}</td>
                                <td><a href="{{ route('corpDetail',['corp_id' => $corp->corp_id]) }}">{{ $corp->corp_name }}</td>
                                <td>{{ $corp->tel }}</td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
</div>
@endsection
