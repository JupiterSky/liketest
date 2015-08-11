
# Test APP

Preconditions:

* Apache, Mysql , PhP installed [on ubuntu](https://www.digitalocean.com/community/tutorials/como-instalar-a-pilha-linux-apache-mysql-php-lamp-no-ubuntu-14-04-pt)



## Running
---

#### 1) Composer

`sudo curl -sS https://getcomposer.org/installer | php`

 
#### 2) Install dependencies of test Project
   
`sudo php composer.phar install `
  
  
#### 3) Run server
  
`sudo app/console server:run`  



#### 4) add permitions to cache folder and logs

` sudo chmod 777 -R app/cache   `
` sudo chmod 777 -R app/logs   `



#### 5) create a database in mysql if you chose pdo_mysql mine its testLikes , 
[http://symfony.com/doc/current/components/config/definition.html](look in symfony docs how to change)


#### 6) Load Samples to DB user and POST
 
 
#### 7) RUN TEST in BEHAT ()

`bin/behat`


The test folder its located in the (Test\UserLikesBundle\Features\)


search in google about "bdd" and "BEHAT"  :P




### Now everyting should be working :)








# Challenge 
------

### Make unlike behavior to the user by a API use the like function to guide :P
 
 
 
 
 
 
 




 
 
 
 






