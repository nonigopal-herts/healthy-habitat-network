1. Setup Docker Desktop for both windows or MacOS
2. pull the project from repository
3. create database named "healthy_habitat"
4. go inside the project directory
5. run the command: docker compose up
6. then runn: docker ps
  You will see a list of docker image. find the container id for "healthy-habitat-network-php". Then run the following command:
php artisan migrate:fresh --seed
8. for project open: localhost:8000/
9. for accessing database: localhost:8080
10. for phpmyadmin:
11.   db: mysql
12.   user: root
13.   pass: secret
    
