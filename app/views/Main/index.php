<div class="text-center">

    <?php if (isset($_SESSION['username'])) : ?>

        <h2>Вы вошли на сайт</h2>

        <button id="get-user">Показать данные пользователя</button>

        <button id="get-form-user-update">Изменить данные пользователя</button>

        <button id="logout">Выйти</button>

        <div class="content">
            <div class="show-info-user"></div>
            <div class="show-form-user"></div>
        </div>

    <?php else: ?>

        <h2>Заполните форму авторизации пользователя</h2>

        <form id="form-login" action="/main/login" method="post">
            <label for="login">Логин: </label>
            <input name="login" type="text" required="required">
            <label for="pass">Пароль: </label>
            <input name="pass" type="text" required="required">
            <button type="submit">Войти</button>
        </form>

    <?php endif; ?>

</div>