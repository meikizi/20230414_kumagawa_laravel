@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <div class="thanks__content">
        <div class="thanks__inner">
            <div class="thanks__item">
                <h2 class="thanks__heading">ご意見いただきありがとうございました。</h2>
            </div>
            <div class="form__button">
                <button class="form__button-redirect">トップページへ</button>
            </div>
        </div>
    </div>
@endsection
