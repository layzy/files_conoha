# Files External for ConoHa Object Storage
Place this app in **owncloud/apps/**

## What is this
外部ストレージ連携機能（Files External）を拡張し、ConoHaのオブジェクトストレージに対応したものです。
具体的にはマルチバイトのファイル名/フォルダ名に関する取り扱いです。
（日本語のために作りましたが、他のマルチバイト言語でも多分大丈夫です）

## Publish to App
1. **owncloud/apps/**に files_conohaディレクトリを配置
2. システム管理者でownCloudにログイン
3. 左上メニュー->アプリ でアプリ画面に遷移
4. 左メニュー->無効->Files External を有効化
5. 左メニュー->無効->Files ConoHa を有効化

## Configuration
1. システム管理者でownCloudにログイン
2. 右上メニュー->管理 で管理画面に遷移
3. 「外部ストレージ」で「ストレージを追加」のところから「ConoHa object storage」を選択する
4. あとはその他設定を入力する

## Note
* 外部ストレージ連携機能（Files External）を拡張するプラグインのため、外部ストレージ連携機能を有効にしている必要があります。
* ownCloud本体のver8.1以下から8.2以上にバージョンアップする際、mount.jsonのフォーマットが変わってしまうため画面が真っ白になってしまうことがあります。
  その際はdataディレクトリ以下のmount.jsonを削除してください。
  もしくは、バージョンアップ前に全ての外部ストレージ連携設定を外してください。（プラグインをオフにするだけではダメです）