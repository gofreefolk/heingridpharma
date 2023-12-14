FROM php:5.5-apache
RUN rm /bin/sh && ln -s /bin/bash /bin/sh 
RUN apt-get update && apt-get install -y libxml2-dev && \
apt-get install -y gettext-base && \
apt-get install -y mcrypt php5-mcrypt mlocate 
RUN php5enmod mcrypt  
# RUN apt-get update && \
#     apt-get install -y libmcrypt-dev
# RUN docker-php-ext-install mcrypt
WORKDIR /var/www/html

# COPY servicecube /var/www/html/servicecube
EXPOSE 443
EXPOSE 80