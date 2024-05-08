# AI国芳
顔写真を基に歌川国芳の武者絵または美人画風の似顔絵を生成<br>
画像生成AI：Midjourney<br>
参考URL：https://studio.kemco.keio.ac.jp/ukiyoe2023/kuniyoshi_ichiran

# 概要
ローカル                                 
- camera.py：撮影コード
- download.py：生成画像自動保存コード
- get_pos.py：デスクトップの座標取得コード
- get_url.py：生成画像の画像URL取得コード
- midjourney.py:画像生成コード

- start.php：画風選択ページ
- making.php：画像生成待ちページ
- finish.php：生成画像表示ページ

- mid-function.js：ローディング用js
- myfile.txt：画像URL書き込みファイル


サーバ
- upload.php：生成画像アップロードページ
- kuniyoshi_ichiran.php：作品一覧ページ

css, imageフォルダの中身はコードと同じ階層に置く

# 使用方法
## データベース作成
テーブル：ukiyoe2023_kuniyoshi

| 名前 | タイプ | 照合順序 | デフォルト値 | その他 |  
| -------- | -------- | ------------------ | ----------------- | -------------- |
|    id    |   int    |  　|  | AUTO_INCREMENT |
|   path   |   text   | utf8mb4_general_ci |  |  |
| datetime | datetime |  | CURRENT_TIMESTAMP |  |

## Discord設定
1. "Midjourney Image Download Server"というサーバを作成
2. Midjourney BotをMidjourney Image Download Serverに追加
3. "ukiyoe_bot"というボットを作成し, Midjourney Image Download Serverに追加

参考URL：https://medium.com/@neonforge/how-to-create-a-discord-bot-to-download-midjourney-images-automatically-python-step-by-step-guide-90b6a8336e82

## デスクトップ配置
以下の画像のようにdesktopフォルダ内の武者絵4枚, 美人画4枚, person.pngとDiscord画面をデスクトップに配置<br>
!! DiscordはMidjourney Image Download Serverを開いた状態にすること<br>
Discordの「ユーザ設定>テーマ>拡大率」を調整し, 「/blend image1: image2: image3: image4: image5:」と入力した時に画像挿入枠5つが画面内に収まるようにする<br>
get_pos.pyを実行して各画像やDiscordのテキストボックスの座標を取得し, midjourney.py内のCoordinateの値を変更

<img src="https://github.com/kemco2019/ukiyoe_kuniyoshi/assets/128669621/fc8b7200-7cd7-4877-81b8-219ce9509432" width="800">

## コードの書き換え
以下の値を適切な値, 文字列に書き換える
- download.py：YOUR_DISCORD_BOT_TOKEN
- kuniyoshi_ichiran.php：DATABASE_SERVER, DATABASE_NAME, USER_NAME, PASSWORD
- midjourney.py：YOUR_DISCORD_BOT_TOKEN, 0000000000000000000(CHANNEL)
- upload.php：YOUR_PATH

# 実行
- モニタ等を繋ぎ, デスクトップ画面とブラウザ画面を別画面で表示すること
- 画風選択後, ページ遷移するまでの間, PyAutoGUIでDiscordへの入力を制御しているのでキーボードやトラックパッドに触れないこと

0. ローカルサーバを起動, download.py, get_url.pyは常時実行
   ```
   php -S 127.0.0.1:8080
   python3 download.py
   python3 get_url.py
   ```
1. start.phpのカメラボタンからカメラを起動, 撮影(Cキー：撮影, Qキー：カメラ終了)
2. start.phpで武者絵風, 美人画風のいずれかを選択し丸印をクリック
3. making.phpに遷移
4. 画像生成が終わるとfinish.phpに遷移
5. finish.phpで保存ボタンをクリックしサーバに生成画像をアップロード
6. 戻るボタンでstart.phpに戻る
