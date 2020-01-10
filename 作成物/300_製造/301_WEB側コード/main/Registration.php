<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー登録</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/Registration.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
</head>
<body>
<div class="registration">
    <?php
        echo DIRECTORY_SEPARATOR;
    ?>
    <div class="registration1">
        <h1>ASO English +</h1>
        <p>管理者登録</p>
    </div>
        <div class="registration2">
            <form action="" method="post">
                <dl>
                    <dt>教職員番号</dt>
                    <dd><input  type="number" name="name" value="" placeholder="半角数字で入力してください" required></dd>
                    <dt>姓名</dt>
                    <dd><input type="text" name="pass" value="" placeholder="麻生花子" required></dd>
                    <dt>所属学校名</dt>
                    <dd>
                        <select name="schoolname" required>
                            <option value="">麻生情報ビジネス専門学校</option>
                            <option value="">--</option>
                            <option value="">--</option>
                            <option value="">--</option>
                            <option value="">--</option>
                            <option value="">--</option>
                            <option value="">--</option>
                            <option value="">--</option>
                        </select>
                    </dd>
                    <dt>担当国名</dt>
                    <dd>
                        <select name="country" required>
                            <option value="">麻生事業部の教員ではありません</option>
                            <option value="">--</option>
                            <option value="">--</option>
                            <option value="">--</option>
                            <option value="">--</option>
                            <option value="">--</option>
                            <option value="">--</option>
                            <option value="">--</option>
                        </select>
                    </dd>
                    <dt>メールアドレス</dt>
                    <dd><input type="email" name="pass" value="" placeholder="麻生花子" required></dd>
                    <dt>パスワード</dt>
                    <dd><input type="password" name="pass1" value="" placeholder="半角英数字で入力してください" required></dd>
                    <dd class="last"><input type="password" name="pass2" value="" placeholder="確認のためもう一度入力してください" required></dd>
                </dl>
                <div class="c1">
                    <input id="check" type="submit" name ="check" value = "確認" class="button">
                </div>

        </form>
    </div>
</div>
    <p class="c2">by KUGA Tech</p>
</body>
</html>