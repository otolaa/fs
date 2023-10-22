## Задание: разработка проекта для сжатия урлов
Требования:

```
- Возможность сокращать через веб-форму 
- Возможность сокращать через api (json)
- использовать базу данных MariaDB (замена на postgrey, запросы через PDO)
- нельзя использовать фреймворки
- нельзя использовать композер
- делать по принципу ООП/MVC

Можно добавить авторизацию/регистрацию с подтверждением по email
```

### help - /web/index.php (основной раздел /web/)
```
# Докер PHP работает <?php а не <?
# auth for postgrey
psql -Ufs2 -hdb -dfs2
\l # return list db
\dt # return list tables 
```
добавить две таблицы, для работы моделей
```
CREATE TABLE news (
    id SERIAL PRIMARY KEY,
    slug VARCHAR(255) UNIQUE NOT NULL,
    title VARCHAR(255) UNIQUE NOT NULL,
    description TEXT,
    date timestamp NOT NULL DEFAULT NOW(),
    active BOOLEAN DEFAULT(TRUE) NOT NULL
);

CREATE TABLE links (
    id SERIAL PRIMARY KEY,
    slug VARCHAR(255) UNIQUE NOT NULL,
    url VARCHAR(255) UNIQUE NOT NULL,
    date timestamp NOT NULL DEFAULT NOW(),
    active BOOLEAN DEFAULT(TRUE) NOT NULL
);

INSERT INTO news (slug, title, description) VALUES ('mikro_freworks', 'Маленький очень маленький фреймворк Fs', 'Возможно будит кому то интересен');
INSERT INTO news (slug, title, description) VALUES ('works_api', 'Продолжается работа ад API', 'Формируется новое АПИ');
INSERT INTO news (slug, title, description) VALUES ('Links_add', 'Добавлена новая модель', 'Links новая модель, таблица links');
```