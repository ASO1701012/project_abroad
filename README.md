# ASO English+
## 概要
```
 ASO English+はwebとモバイルで分けたシステムです。
 webは管理者である事業開発センターの教師が扱い麻生内で開催する英語の講座や留学の説明会を新規作成や更新、ユーザ管理を行うことができるシステムです。
 モバイルは、麻生内の生徒が使用し、英語の講座や留学の説明会の申し込み、英語の単語練習を行うことができるシステムです。
```
## 動作環境
### 管理者側webアプリケーション
```
html
css
Javascript
jQuery
Ajax
```
### 学生ユーザ側スマホ向けアプリケーション
```
html
css
Javascript
jQuery
jQueryUiI
Service woeker
```
### 管理者側DBサーバー
```
EC2サーバー
Amazon Linux2
Apache 2.4
PHP 7.2
MariaDB
```
### 学生側サーバー
```
Amazon Linux2
Apache 2.4
PHP 7.2
Let'sEncrypt
Mysql
```
### LINEサービス
```
LINE Messaging API
LINE Login
```
## 環境構築
### EC2サーバー(WEB側)  
#### Apacheをインストール
```   
sudo yum update

sudo yum -y install httpd    
```  
#### PHP7.2をインストール  
```
sudo amazon-linux-extras install php7.2

sudo yum install php php-mbstring
```
#### Apacheを起動
```
sudo service httpd start
```
#### mariadbをインストール  
```
sudo yum install -y mariadb-server

sudo yum install php php-mbstring
```
#### mariadbを起動
```
sudo systemctl start mariadb
```
#### mariadbを有効化
```
sudo systemctl enable mariadb

sudo systemctl is-enabled mariadb
```
## EC2サーバー(モバイル側)  
### Apacheをインストール
```   
sudo yum update

sudo yum -y install httpd    
```  

#### PHP7.2をインストール  
```
sudo amazon-linux-extras install php7.2

sudo yum install php php-mbstring
```
#### Apacheを起動
```
sudo service httpd start
```
#### Mysql(コマンドのみ)をインストール
```
sudo yum install mysql-devel
```
## 使用方法
```
ブラウザで自身で設定したIPアドレス、ドメインでサイトを開くことで利用可能になります。
```
## メンバー
- 中村賢哉
- 宮田隼人
- 松尾崚広
- 酒井春華
- 德重琢磨
