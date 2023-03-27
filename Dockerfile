# Образ php + fpm + alpine из внешнего репозитория
FROM php:8.0-fpm-alpine as base
 
# Задаем расположение рабочей дирректории
WORKDIR /var/www/application

FROM base

# Указываем, что текущая папка проекта копируется в рабочую дирректорию контейнера https://docs.docker.com/engine/reference/builder/#copy
COPY . ${WORK_DIR}
 
#RUN   chmod 777 public/garden.txt

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
