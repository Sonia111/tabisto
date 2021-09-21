FROM node:14

RUN mkdir /usr/src/app

WORKDIR /usr/src/app

RUN ls -la

COPY . .

RUN npm install -g @angular/cli

EXPOSE 4200

CMD ["npm", "start"]