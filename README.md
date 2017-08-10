# brse-interview
BrSE面接の練習システム。

このシステムには、弊社の面接に使う質問集を登録し、面接中に質問を一覧し、選択し利用するようにする。

# 動作環境
* composer
* php
* php-sqlite

# システムインストール

## githubからソースコードを取得し、ウェブディレクトリをsrc/app/webに設定する。
https://github.com/umbalaconmeogia/brse-interview.git

## ファイルパーミッションの設定（Linux環境にインストール場合のみ）
以下は、ウェブサーバの実行ユーザ（例えばapache）に権限を与える。

* src/app/yiiに実行モード

* src/app/runtimeに書込モード

* src/serverSpecificに書込モード（今回はsqliteDBファイルをここに置くため必要になる）

## yii2と他のライブラリーをダウンロード

src/yii2で実行する
```shell
# This is needed for bower-asset to be changed to bower.
composer require "fxp/composer-asset-plugin:^1.2.0"
composer install
```
## Migration実行

src/appフォルダでコマンドを実行する。
```shell
./yii migrate
```