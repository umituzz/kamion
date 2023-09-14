FROM node:18-alpine
WORKDIR /app/frontend
COPY package*.json .
RUN npm install -g react-scripts@5.0.1 --silent
RUN npm install
COPY . .
EXPOSE 8080
CMD ["npm", "start"]