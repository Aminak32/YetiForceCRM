<?php
/* {[The file is published on the basis of YetiForce Public License that can be found in the following directory: licenses/License.html]} */
$languageStrings = [
	'LBL_PORT' => 'Порт:',
	'BackUp'	=>	'Резервное копирование',
	'LBL_BACKUP_DESCRIPTION'	=>	'Создание резервных копий системы',
	'LBL_SAVE_BACKUP'	=>	'Сохранить резервную копию',
	'LBL_SCHEDULE_BACKUP'	=>	'Создать резервную копию',
	'LBL_LOADING'	=>	'Создается резервная копия, пожалуйста ждите...',
	'LBL_FTP_SETTINGS'	=>	'Настройки FTP',
	'LBL_BACKUP_CREATING'	=>	'Резервное копирование',
	'LBL_RESUME_BACKUP'	=>	'Продолжить резервное копирование',
	'LBL_START_TIME'	=>	'Создано',
	'LBL_FILE_NAME'	=>	'Имя файла',
	'LBL_ACTION'	=>	'Действия',
	'LBL_ATTEMPTS'	=>	'Попыток создания',
	'LBL_ATTEMPTS'	=>	'Попыток создания',
	'LBL_FTP_SAVE_CONFIG'	=>	'Сохранить конфигурацию',
	'LBL_HOST'	=>	'Хост:',
	'LBL_LOGIN'	=>	'Логин',
	'LBL_PASSWORD'	=>	'Пароль',
	'LBL_CONNECTION_STATUS'	=>	'Состояние',
	'LBL_SEND_TO_FTP'	=>	'Отправить по FTP',
	'LBL_ACTIVE' => 'Активен',
	'LBL_PATH' => 'Путь для сохранения:',
	'LBL_PATH_INFO' => 'Если поле (Путь для сохранения) пустое, резервная копия будет сохраняться в корневую папку системы',
	'LBL_EMAIL_NOTIFICATIONS' => 'Уведомление по Почте',
	'LBL_USERS_FOR_NOTIFICATIONS' => 'Пользователи для уведомления',
	'LBL_SAVE_CHANGES' => 'Изменения сохранены',
	'LBL_GENERAL_SETTINGS' => 'Настройки',
	'LBL_STORAGEFOLDER_INFO' => 'Делать копию папки с данными?',
	'LBL_BACKUPFOLDER_INFO' => 'Делать копию папки с Резервными копиями?',
	'LBL_VALUES' => 'Значение',
	'LBL_DETAIL' => 'Подробности',
	'LBL_BACKUP_COPY_TYPE' =>'__UNTRANSLATED__',
	'LBL_BACKUP_SINGLE' =>'__UNTRANSLATED__',
	'LBL_BACKUP_OVERALL' =>'__UNTRANSLATED__',
	
	'LBL_ALERT_NO_ZIP_EXTENSION_TITLE' => 'No active ZIP library found',
	'LBL_ALERT_NO_ZIP_EXTENSION_DESC' => 'Complete backup is impossible, backup will only create a database copy and it will not be compressed ',
	'LBL_ALERT_CRON_NOT_ACTIVE_TITLE' => 'Cron - backup of data is not active',
	'LBL_ALERT_CRON_NOT_ACTIVE_DESC' => 'Making a backup copy will not be possible, to enable it go to <a href="index.php?module=CronTasks&parent=Settings&view=List" target="_blank">Harmonogram</a> and activate Backup',
	'LBL_ALERT_OUTGOING_MAIL_NOT_CONFIGURED_TITLE' => 'Outgoing mail server is not configured',
	'LBL_ALERT_OUTGOING_MAIL_NOT_CONFIGUREDE_DESC' => 'All email notifications that should be sent after backup will not be sent',
	'LBL_END_TIME' =>'End time',
	'LBL_BACKUP_TIME' =>'Backup duration time',
	'LBL_LOGS' =>'Logs',
	'Completed' =>'Correct',
	'In progress' =>'In progress',
	'LBL_SET_SCHEDULE_BACKUP' => 'Backup has been scheduled',

	'LBL_STAGE_1' =>'Creating empty SQL file',
	'LBL_STAGE_2' =>'Generating backup structure',
	'LBL_STAGE_3' =>'Creating database backup',
	'LBL_STAGE_4' =>'Generating files and folders structure',
	'LBL_STAGE_5' =>'Creating file and folders backups',
	'LBL_STAGE_6' =>'Merging backup files',
	'LBL_STAGE_7' =>'Clearing provisional data',
	'LBL_STAGE_8' =>'Sending data to FTP',
	'LBL_STAGE_9' =>'Completing backup',
];
$jsLanguageStrings = [
	'JS_MANDATORY_FIELDS_EMPTY' => 'Необходимо заполнить Обязательные поля',
	'JS_PORT_ONLY_NUMBERS' => 'Поле Порт, может содержать только цифры',
	'JS_SAVE_CHANGES' => 'Изменения успешно сохранены',
	'JS_HOST_NOT_CORRECT' => 'Некорректный адрес Хоста',
	'JS_CONNECTION_FAIL' => 'Неудачная попытка соединения',
];
