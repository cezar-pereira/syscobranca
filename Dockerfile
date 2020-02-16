FROM wyveo/nginx-php-fpm:latest
WORKDIR /usr/share/nginx/
RUN rm -rf /usr/share/nginx/html
COPY . /usr/share/nginx
# RUN chmod -R 775 /usr/share/nginx/storage/*
# # RUN ln -s public html
COPY default.conf /etc/nginx/conf.d/


# INSTRUCOES

# 1 RODA O COMANDO ABAIXO NA PASTA DO PROJETO NO CONTAINER (docker exec -it laravel-docker_laravel-docker_1 bash)
# chown nginx -R /usr/share/nginx/storage