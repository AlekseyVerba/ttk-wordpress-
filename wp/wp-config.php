<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'ttk' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'admin' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'admin123' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'wY-tqIhK|c-W&?bTU@il?[[_C?mS<hFUX*&hJDx6z_aXnb-.&2h7ln;e!t1g?|v`' );
define( 'SECURE_AUTH_KEY',  ')5W2V_RM*sx~+o_kL79Sebmmq$Mg|x|Jvfnop2MkK(2q$xai=aBmBfm^eH^h^fS>' );
define( 'LOGGED_IN_KEY',    'm+`S{##:~x5^sooB`-l.]0h}gN.|$VM]4qNC(YbFT4_SbagYqH]%inB#~HY4)T;^' );
define( 'NONCE_KEY',        'p=dm5!Jt3FF3#jT.pnS!JXyKv8+2QIg?&H||CcX<e4YUV!.bKLk/p.wl,xMVTv;_' );
define( 'AUTH_SALT',        'A{MMAb=FVE[vCzf2yLqj:(QdMNNYGx!WjI Yh<HJaQ(Ru@CcjyHSb?(Td%3NZH_)' );
define( 'SECURE_AUTH_SALT', 'Chw|{E6OdR?=iB%.lco*7Y<~^jl,onKh)<rAZw b1Ser:J.axNHF8.i.dmw64N)_' );
define( 'LOGGED_IN_SALT',   '{[wi?3.+yPlGVrD3)9CC$49v%$kc,c-R}<_}2pJ2UiY(Js=g[`1Hn?=ZlB1y;&Rf' );
define( 'NONCE_SALT',       'tZ$s-x}:RPE)w( AD<]FHz/w!((TF-X&cFl4mpn`aiH).kha%nN&*bdXToFa1R;d' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
