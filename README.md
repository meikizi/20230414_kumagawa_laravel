READMEテンプレート

# アプリケーション名
お問い合わせフォーム

PHPのフレームワークLaravelを使ってのお問い合わせフォームのサンプルコードです。
トップページの下部にある「確認」ボタンを押すと内容確認ページに遷移します。
内容確認ページの下部にある「送信」ボタンを押すとサンクスページに遷移し、データベースに保存されます。
内容確認ページの下部にある「修正する」ボタンを押すとトップページに戻ります。
また、データベースのデータを検索や削除を行うことの出来る管理システムページも用意してあります。
< --- トップ画面の画像 --- >
https://github.com/meikizi/laravel-test/issues/1#issue-1666064146

## 作成した目的
PHPのフレームワークLaravelを学ぶために作成しました。

## 機能一覧
データベースにデータを登録する機能
データベースのデータを検索する機能
データベースのデータを削除する機能

## 使用技術(実行環境)
Laravel Framework 8.83.8

## テーブル設計
<-- 作成したテーブル設計の画像 -->
https://github.com/meikizi/20230414_kumagawa_laravel/issues/3#issue-1667269925

## ER図
今回はリレーションを行っていないため作成していません。

## 実装できなかったもの
管理システムページの登録日検索の実装
created_at,updated_atのフォーマットを変更できませんでした。
