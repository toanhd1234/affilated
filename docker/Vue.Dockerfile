FROM node:lts-alpine
# make the 'app' folder the current working directory
WORKDIR /var/www/html/vue
# copy 'package.json' to install dependencies
COPY frontend .
# install dependencies
RUN npm install
RUN npm run build