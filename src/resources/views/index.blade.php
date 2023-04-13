@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
@endsection

@section('content')
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>お問い合わせ</h2>
        </div>
        <form class="form" action="{{ route('contacts.confirm') }}" method="post">
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label-item">お名前</span>
                    <span class="form__label-required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--name">
                        <div class="form__input--name-item">
                            <input type="text" name="last_name" value="{{ old('last_name', session('last_name')) }}" />
                            <p class="placeholder">例）山田</p>
                            <div class="form__error">
                                @error('last_name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form__input--name-item">
                            <input type="text" name="first_name" value="{{ old('first_name', session('first_name')) }}" />
                            <p class="placeholder">例）太郎</p>
                            <div class="form__error">
                                @error('first_name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label-item">性別</span>
                    <span class="form__label-required">※</span>
                </div>
                <div class="form__group-content--radio">
                    <div class="form__input--radio">
                        <div class="form__input--radio-man">
                            <input type="radio" name="gender" class="input--radio" value="1" "{{ old('gender', session('gender')) === '1' ? 'checked' : '' }}" id="man" checked />
                            <label for="man" class="input--radio-gender">男性</label>
                        </div>
                        <div class="form__input--radio-woman">
                            <input type="radio" name="gender" class="input--radio" value="2" "{{ old('gender', session('gender')) === '2' ? 'checked' : '' }}" id="woman" />
                            <label for="woman" class="input--radio-gender">女性</label>
                        </div>
                    </div>
                    <div class="form__error">
                        @error('gender')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label-item">メールアドレス</span>
                    <span class="form__label-required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="email" name="email" value="{{ old('email', session('email')) }}" />
                        <p class="placeholder">例）test@example.com</p>
                    </div>
                    <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                        <span class="form__label-item">郵便番号</span>
                        <span class="form__label-required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--address">
                        <span class="input--address-item">〒</span>
                        <input type="text" name="postcode" onKeyUp="AjaxZip3.zip2addr('postcode', '', 'address', 'address');" value="{{ old('postcode', session('postcode')) }}" size="8" maxlength="8" />
                        <p class="placeholder">例）123-4567</p>
                    </div>
                    <div class="form__error">
                        @error('postcode')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label-item">住所</span>
                    <span class="form__label-required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="address" value="{{ old('address', session('address')) }}" />
                        <p class="placeholder">例）東京都渋谷区千駄ヶ谷1-2-3</p>
                    </div>
                    <div class="form__error">
                        @error('address')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label-item">建物名</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="building_name" value="{{ old('building_name', session('building_name')) }}" />
                        <p class="placeholder">例）千駄ヶ谷マンション101</p>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label-item">ご意見</span>
                    <span class="form__label-required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--textarea">
                        <textarea name="opinion" maxlength="120">{{ old('opinion', session('opinion')) }}</textarea>
                    </div>
                    <div class="form__error">
                        @error('opinion')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">確認</button>
            </div>
        </form>
    </div>
@endsection
