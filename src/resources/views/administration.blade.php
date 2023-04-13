@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/administration.css') }}">
@endsection

@section('content')
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>管理システム</h2>
        </div>
        <div class="contact-form__inner">
            <form class="search-form" action="{{ route('administrations.search') }}" method="get">
                @csrf
                <div class="search-form__outer-group">
                    <div class="search-form__group">
                        <div class="search-form__group-title--name">
                            <span class="search-form__label--item">お名前</span>
                        </div>
                        <div class="search-form__group-content">
                            <div class="search-form__input">
                                <input type="text" name="fullname" value="{{ $contacts['fullname'] }}"  />
                            </div>
                        </div>
                    </div>
                    <div class="search-form__group">
                        <div class="search-form__group-title--gender">
                            <span class="search-form__label--item">性別</span>
                        </div>
                        <div class="search-form__group-content--radio">
                            <div class="search-form__input--radio">
                                <div class="search-form__input--radio-all">
                                    <input type="radio" name="gender" class="input--radio" value="0" "{{ old('gender') === '!(1 || 2)' ? 'checked' : '' }}" id="all" checked />
                                    <label for="all" class="input--radio-gender">全て</label>
                                </div>
                                <div class="search-form__input--radio-man">
                                    <input type="radio" name="gender" class="input--radio" value="1" "{{ old('gender') === '1' ? 'checked' : '' }}" id="man" />
                                    <label for="man" class="input--radio-gender">男性</label>
                                </div>
                                <div class="search-form__input--radio-woman">
                                    <input type="radio" name="gender" class="input--radio" value="2" "{{ old('gender') === '2' ? 'checked' : '' }}" id="woman" />
                                    <label for="woman" class="input--radio-gender">女性</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search-form__group">
                    <div class="search-form__group-title">
                        <span class="search-form__label--item">登録日</span>
                    </div>
                    <div class="search-form__group-content">
                        <div class="search-form__input">
                            <input type="date" name="created_at" value="{{ $contacts['created_at'] }}" />
                            <span class="timestamps--span">~</span>
                            <input type="date" name="to" value="{{ $contacts['created_at'] }}" />
                        </div>
                    </div>
                </div>
                <div class="search-form__group">
                    <div class="search-form__group-title">
                        <span class="search-form__label--item">メールアドレス</span>
                    </div>
                    <div class="search-form__group-content">
                        <div class="search-form__input">
                            <input type="email" name="email" value="{{ $contacts['email'] }}" />
                        </div>
                    </div>
                </div>
                <div class="search-form__button">
                    <button class="search-form__button-submit" type="submit">検索</button>
                    <input type="reset" class="search-form__button-reset" value="リセット">
                </div>
            </form>
        </div>
        {{ $contacts->links('vendor.pagination.tailwind') }}
        <div class="database">
            <div class="database__header">
                <p class="database__p--id">ID</p>
                <p class="database__p--name">お名前</p>
                <p class="database__p--gender">性別</p>
                <p class="database__p--email">メールアドレス</p>
                <p class="database__p--opinion">ご意見</p>
            </div>
            @foreach ($contacts as $contact)
                <div class="database__data">
                    <p class="database__p--id">{{ $contact['id'] }}</p>
                    <p class="database__p--name">{{ $contact['fullname'] }}</p>
                    <p class="database__p--gender">{{ $contact['gender'] === 1 ? '男性' : '女性' }}</p>
                    <p class="database__p--email">{{ $contact['email'] }}</p>
                    <p class="database__p--opinion">{{ $contact['opinion'] }}</p>
                    <form class="delete-form" action="{{ route('administrations.delete') }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{ $contact['id'] }}">
                        <button class="database__button-delete">削除</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
