# AI国芳
顔写真を基に歌川国芳の武者絵または美人画風の似顔絵を生成<br>
参考URL：https://studio.kemco.keio.ac.jp/ukiyoe2023/kuniyoshi_ichiran

# 概要
- camera.php:顔写真撮影ページ                                 
- camera.py:撮影コード
- download.py:生成画像自動保存コード
- finish.php:生成画像表示ページ
- get_url.py:生成画像の画像URL取得コード
- making.php:画像生成待ちページ
- midjourney.py:画像生成コード
- myfile.txt:画像URL書き込みファイル
- start.php:画風選択ページ
- upload.php:生成画像アップロードページ

# 使用方法
## データベース作成

## Discordの設定
1. "Midjourney Image Download Server"というサーバを作成
2. Midjourney BotをMidjourney Image Download Serverに追加
3. "ukiyoe_bot"というボットを作成し, Midjourney Image Download Serverに追加

参考URL：https://medium.com/@neonforge/how-to-create-a-discord-bot-to-download-midjourney-images-automatically-python-step-by-step-guide-90b6a8336e82

## デスクトップ画面の配置
以下の画像のように武者絵4枚, 美人画4枚, person.png, Discordをデスクトップに配置<br>
各画像やDiscordのテキストボックスの座標を確認し, midjourney.pyのCoordinateの値を変更<br>
<img src="https://github.com/kemco2019/ukiyoe_kuniyoshi/assets/128669621/fc8b7200-7cd7-4877-81b8-219ce9509432" width="800">

# 実行
0. ローカルサーバを起動, download.py, get_url.pyは常時実行
   ```
   php -S 127.0.0.1:8080
   python3 download.py
   python3 get_url.py
   ```
2. camera.phpをロードしカメラを起動, 撮影(Cキー：撮影, Qキー：カメラ終了)
3. start.phpで武者絵風, 美人画風のいずれかを選択し丸印をクリック
4. making.phpに遷移
5. 画像生成が終わるとfinish.phpに遷移
6. finish.phpで保存ボタンをクリックしサーバに生成画像をアップロード
7. 戻るボタンでstart.phpに戻る
