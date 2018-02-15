(function () {
    'use strict';

    document.getElementById('vk_reg').addEventListener("click", vkReg);
    function vkReg() {
        VK.init({
            apiId: 6374312
        });

        VK.Auth.login(function(response) {
            if (response.session) {
                console.log('Пользователь успешно авторизовался ');
                /* Пользователь успешно авторизовался */
                if (response.settings) {
                    console.log('Выбранные настройки доступа пользователя, если они были запрошены');
                    /* Выбранные настройки доступа пользователя, если они были запрошены */
                }
            } else {
                console.log('Пользователь нажал кнопку Отмена в окне авторизации');
                /* Пользователь нажал кнопку Отмена в окне авторизации */
            }
        });
    }
}());