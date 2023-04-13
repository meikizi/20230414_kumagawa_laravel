@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
    <div class="confirm__content">
        <div class="confirm__heading">
            <h2>内容確認</h2>
        </div>
        <form class="form" action="{{ route('contacts.store') }}" method="post">
            @csrf
            <div class="confirm__table">
                <table class="confirm__table__inner">
                    <tr class="confirm__table__row">
                        <th class="confirm__table__header">お名前</th>
                        <td class="confirm__table__text">
                            <input type="text" name="fullname" value="{{ $contact['last_name'] . ' ' . $contact['first_name'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm__table__row">
                        <th class="confirm__table__header">性別</th>
                        <td class="confirm__table__text">
                            <input type="hidden" name="gender" value="{{ $contact['gender'] === '1'  ? '1' : '2' }}" readonly />
                            <div class="confirm__table__text--gender">
                                @if ($contact['gender'] === '1')
                                    男性
                                @else
                                    女性
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr class="confirm__table__row">
                        <th class="confirm__table__header">メールアドレス</th>
                        <td class="confirm__table__text">
                            <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm__table__row">
                        <th class="confirm__table__header">郵便番号</th>
                        <td class="confirm__table__text">
                            <input type="text" name="postcode" value="{{ $contact['postcode'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm__table__row">
                        <th class="confirm__table__header">住所</th>
                        <td class="confirm__table__text">
                            <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm__table__row">
                        <th class="confirm__table__header">建物名</th>
                        <td class="confirm__table__text">
                            <input type="text" name="building_name" value="{{ $contact['building_name'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm__table__row">
                        <th class="confirm__table__header--opinion">ご意見</th>
                        <td class="confirm__table__textarea">
                            <textarea name="opinion" maxlength="120" readonly>{{ $contact['opinion'] }}</textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">送信</button>
            </div>
        </form>
        <form class="form" action="{{ route('edits') }}" method="post">
            @csrf
            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
            <input type="hidden" name="gender" value="{{ $contact['gender'] === '1'  ? '1' : '2' }}" />
            <input type="hidden" name="email" value="{{ $contact['email'] }}" />
            <input type="hidden" name="postcode" value="{{ $contact['postcode'] }}" />
            <input type="hidden" name="address" value="{{ $contact['address'] }}" />
            <input type="hidden" name="building_name" value="{{ $contact['building_name'] }}" />
            <input type="hidden" name="opinion" value="{{ $contact['opinion'] }}" />
            <button class="form__button-redirect" type="submit">修正する</button>
        </form>
    </div>
@endsection
