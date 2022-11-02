<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'trueflex_scorpion' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'trueflex_scorpion' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'j37X%m^U7g' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'trueflex.mysql.tools' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '{&T+F%O`:oQJc!]kziZlhE]~N p>Ds$nOd_+e0u:U9i5iDI`U02BoO>_tsR6B>5*' );
define( 'SECURE_AUTH_KEY',  'D$@7O/+|Rg[6YELb/j2&U=(P%ZYIH%iG1jhi=X(O~7GK7FO_;tiRb-ohdPYBS=x?' );
define( 'LOGGED_IN_KEY',    '^|F_=e<LkJ~z!}-=Fgiv:aZ9f^(8^MF_+FF<q;s[`J#ru[C?kY+t,)kfK#;?N4C9' );
define( 'NONCE_KEY',        ',(DK9@i.2AHVKb^a`WrKbt~Z#ke-,r&+,LJ5&`YL$/9xRK^HR!,8|b1O<W2=IKY$' );
define( 'AUTH_SALT',        'ztW$[ME<_u!|z6y9TOPgT`%lnMil8<^,^?4Z6+Ir+C1pN2qRR >`wiNa+#`FR=JQ' );
define( 'SECURE_AUTH_SALT', '8JGA`a)D(5(Ci9Vy;2TEGE&OqBi^fGK%V|AmS}{cd4>?- @~DQ(,4-qZ1tl+d+WJ' );
define( 'LOGGED_IN_SALT',   '/qtKE[k{){qxlM-2zSIm@BH.8m tub8R[)p;lW$!xe[~NgAZ[eiuk&{cZh*f^zAq' );
define( 'NONCE_SALT',       '&6^,g@?kbG)-H56NW-]q?.ceW)j3YLWz:{hJGsp)MlOp{+n1ROP[IcL{AoBXO;P<' );

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

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
