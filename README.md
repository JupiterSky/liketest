
# Test APP

Preconditions:

* Apache, Mysql , PhP installed [on ubuntu](https://www.digitalocean.com/community/tutorials/como-instalar-a-pilha-linux-apache-mysql-php-lamp-no-ubuntu-14-04-pt)

* INSTALL GIT 

## Download Project TEST LIKES

Have 2 options 
* Download from button with text `Download Zip`

* Clone the project with git and user the `VCS`
    * Install:
        * `git clone https://github.com/JupiterSky/liketest.git testApp`
        * `cd testApp`



## Running
---


#### 1) Composer

`sudo curl -sS https://getcomposer.org/installer | php`



#### 2) create a database in mysql if you chose pdo_mysql mine its testLikes , 
[http://symfony.com/doc/current/components/config/definition.html](look in symfony docs how to change)



#### 3) Configure the parameters.yml

In the directory app/config/ have a file that i prepare for you just rename to parameters.yml and change to your configuration
 


#### 4) Install dependencies of test Project
   
`sudo php composer.phar install `
  
#### 5) add permitions to cache folder and logs

` sudo chmod 777 -R app/cache   `.

` sudo chmod 777 -R app/logs   `
  
  
  
#### 6) Run server
  
`sudo app/console server:run`  



#### 7) Create a Schema and Load Samples to DB user and POST


 `php app/console doctrine:schema:create`   

 `php app/console doctrine:fixtures:load`
 
#### 8) RUN TEST in BEHAT ()

`bin/behat`


The test folder its located in the (Test\UserLikesBundle\Features\)


search in google about "bdd" and "BEHAT"  :P




### Now everyting should be working :)








# Challenge 
------

### Make unlike behavior with API

### Make whatever you want :)

Tips:

* The actual test to like function its saying everything;
* Sometimes you just need clear the cache folder    
* `app/console ` and the commands of symfony2 ;


 
 
 
 
 
 
 




 
 
 
 






