Устанавливаем Git
sudo apt install git 
Устанавливаем PHP
sudo apt install php7.4-cli
Устанавливаем Composer
sudo apt install composer
Скачиваем репозиторий
git clone https://github.com/Lyapkov/Libraty.git
Стягиваем зависимости
composer install
Запускаем сервер
php bin/console server:run
Создаем БД с помощью doctrine
php bin/console doctrine:database:create

php bin/console make:migration
php bin/console doctrine:schema:update --force

