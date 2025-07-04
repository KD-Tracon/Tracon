# Tracon 開発環境セットアップガイド（VSCode Dev Container 版）

このドキュメントは、Laravel ベースの Tracon プロジェクトを VSCode Dev Container を用いてセットアップする手順をまとめたものです。Docker を用いた開発環境の構築に必要なすべてのステップが含まれています。

---

## 前提条件

以下のツールがインストールされていることを確認してください：

- Visual Studio Code（最新版）
- 拡張機能：
  - Dev Containers または Remote - Containers
- Docker Desktop
- `.env` ファイル： `.env.example` をコピーして作成可能

---

## セットアップ手順

### 1. プロジェクトをクローン

```bash
git clone https://github.com/KD-Tracon/Tracon.git
cd Tracon
```

---

### 2. `.env` ファイルを作成（未作成の場合）

```bash
cp .env.example .env
```

> `.env` 内の `DB_CONNECTION` を `pgsql` に変更してください。また、以下の値を追記または変更します：

```env
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=tracon
DB_USERNAME=tracon_user
DB_PASSWORD=securepassword
```

`.env` の設定に合わせて、`env.txt` にも同様の内容を記述してください。

---

### 3. VSCode でプロジェクトフォルダを開く

プロジェクトルート（`Tracon` フォルダ）を Visual Studio Code で開いてください。

---

### 4. Dev Container を起動

画面左下の「>< Dev Container」アイコン、またはコマンドパレット（`Ctrl+Shift+P`）から次を実行：

```
Dev Containers: Reopen in Container
```

初回起動時は、必要な Docker イメージがビルドされるため時間がかかる場合があります。

---

### 5. コンテナ内で初期化コマンドを実行

VSCode のターミナルで以下のコマンドを順に実行してください：

```bash
composer install
php artisan key:generate
php artisan migrate
php artisan storage:link
```  
万が一以下のコマンド実行時にエラーが表示された際は、コマンド実行してからコマンド実行してください
```bash
$ php artisan storage:link
   ERROR  The [public/storage] link already exists.  
```
エラー発生時の実行コマンド
```bash
rm -rf public/storage
```
---

### 6. 動作確認

ブラウザで以下の URL にアクセス：

```
http://localhost:{フォワードされたポート番号}
```

アップロード画面が表示され、動画をアップロードすると `Hello, world` が表示されます。

---

## 動画ファイルの外部保存（オプション）

ホストマシン側の任意のディレクトリに動画ファイルを保存したい場合、以下のようにシンボリックリンクを作成します：

```bash
mkdir -p /your/path/videos
ln -s /your/path/videos storage/app/public/videos
```

---

## Dev Container の構成概要

- 使用構成ファイル：
  - `.devcontainer/main/devcontainer.json`
  - `.devcontainer/main/compose.yml`
  - `compose.yml`

- サービス一覧：
  - `web`：Nginx
  - `app`：PHP（Laravel アプリケーション）
  - `db`：PostgreSQL
  - `phpmyadmin`：DB 管理 UI（PostgreSQL 用には Adminer ではなく phpMyAdmin を使用）

- フォワードポート：
  - `web:80`
  - `phpmyadmin:8080`

---

## トラブルシューティング

| 症状             | 対処方法                                                            |
| ---------------- | ------------------------------------------------------------------ |
| コンテナが自動で終了する | `.devcontainer.json` に "shutdownAction": "none" を追加           |
| DB に接続できない     | `.env` と `docker-compose.yml` の PostgreSQL 設定を確認             |
| Python が実行できない | `app` コンテナ内に `python3` が存在するか確認し、無ければ `apt install python3` を実行 |

---

以上で Tracon 開発環境のセットアップは完了です。継続的な開発のために Dev Container を利用した効率的な環境構築をぜひ活用してください。

