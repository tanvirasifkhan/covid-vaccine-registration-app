FROM node:20.18-alpine3.20

RUN apk update && apk upgrade && apk add git bash

WORKDIR /frontend

COPY package*.json ./

RUN npm install

COPY . ./

CMD [ "npm", "run", "dev" ]