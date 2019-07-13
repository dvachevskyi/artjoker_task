# Тестовое задание на должность PHP junior Developer

**Дано**: дамп одной таблицы базы данных mysql

**Результат**: получить базу зарегистрированных людей с столбцами id, name, email, territory

Регистрация происходит путем заполнения формы с полями: 
* ФИО
* EMAIL
* Список областей
* Список городов
* Список районов

Изначально на форме расположены 2 текстовых поля ФИО, EMAIL и одно выборное Список областей. Остальная часть формы должна формироваться динамически

При попытке зарегистрироваться под тем же email отдавать карточку пользователя с данными из базы

Все поля в форме обязательны к заполнению

**Условия**:
* предусмотреть валидацию всех полей средствами js (использование jquery приветствуется)
* для select использовать плагин Chosen http://harvesthq.github.io/chosen/
* изменять исходную таблицу в базе данных запрещается

При выполнении этого задания __**будут**__ оцениваться:
* знания mysql, умение анализировать структуру базы данных, запросы
* знание mvc архитектуры 
* стиль написания javascript кода
* умение использовать технологию ajax
* понимание dom структуры страницы

Оцениваться __**не будет**__:
* внешний вид формы


Результат предоставить в виде ссылки на свой git репозиторий