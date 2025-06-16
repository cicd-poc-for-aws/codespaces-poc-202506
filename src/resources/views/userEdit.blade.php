@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8 mx-auto">
        <h1 class="m-3">{{ __('labels.userEdit.Title') }}</h1>
        <form method="GET" action="/userEdit/update">
            <table class="table table-bordered mt-4">
                <tr>
                    <th class="table-secondary col-sm-4">Id</th>
                    <td class="col-sm-8">
                        {{ $user_detail->id }}
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary col-sm-4">ユーザ名</th>
                    <td class="col-sm-8">
                        <input type="text" name="name" value="{{ $user_detail->name }}" id="{{ $user_detail->id }}" class="form-control">
                    </td>
                </tr>
                <tr>
                    <th class="table-secondary col-sm-4">メールアドレス</th>
                    <td class="col-sm-8">
                        <input type="text" name="email" value="{{ $user_detail->email }}" id="{{ $user_detail->id }}" class="form-control">
                    </td>
                </tr>
            </table>
            <div class="mt-5 d-flex justify-content-center">
                <button type="submit" class="btn btn-warning" name="update_user" value="{{ $user_detail->id }}">更新</button>
            </div>
        </form>
    </div>
</div>
@endsection
