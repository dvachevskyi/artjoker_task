<h1>
    Страница авторизации
</h1>
<p>
    <form id="loginForm" action="/main/create" method="post">
        <table class="login">
            <tr>
                <th colspan="2">
                    Регистрация
                </th>
            </tr>
            <tr>
                <td for="name">
                    ФИО
                </td>
                <td>
                    <input name="name" placeholder="ФИО" type="text"/>
                </td>
            </tr>
            <tr>
                <td for="email">
                    Email
                </td>
                <td>
                    <input name="email" placeholder="example@gmail.com" type="text"/>
                </td>
            </tr>
            <tr>
                <td for="selectRegion">
                    Выберите область:
                </td>
                <td>
                    <select class="chosen-select" id="selectRegion" name="selectRegion">
                        <option value="-1">
                            Выберите область ..
                        </option>
                    </select>
                </td>
            </tr>
            <tr id="cityTr" style="display: none;">
                <td for="selectCity">
                    Выберите город:
                </td>
                <td>
                    <select class="chosen-select" id="selectCity" name="selectCity">
                    </select>
                </td>
            </tr>
            <tr id="districtTr" style="display: none;">
                <td for="selectDistrict">
                    Выберите район:
                </td>
                <td>
                    <select class="chosen-select" id="selectDistrict" name="selectDistrict">
                    </select>
                </td>
            </tr>
            <th colspan="2" style="text-align: right">
                <input name="btn" style="width: 150px; height: 30px;" type="submit" value="Зарегистрироваться"/>
            </th>
        </table>
    </form>
</p>
