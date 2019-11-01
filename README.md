# JobLink
Service to allow students to be candidates for job opportunities posted by employers, and be endorsed by staff and local businesses CP3405 - Design Thinking III, James Cook University.

## Team Members
- [Thoman Leumann](https://github.com/tomaslemon)
- [Isabelle Carlsson](https://github.com/IsabelleCarlsson)
- [Nickolas Jucker](https://github.com/Nickolasjucker)
- [Yvan Burrie](https://github.com/jc444304)

### Framework
- [Laravel](https://laravel.com)

## Environment Setup using Vagrant

- Download and install [VirtualBox](https://www.virtualbox.org/)

- Download and install [Vagrant](https://www.vagrantup.com/)

- Add the homstead vagrant files using `git clone https://github.com/laravel/homestead.git`.

- Run `init.bat` in the homestead directory.

### In homstead.yml:
- Remove authentication and ssh otherwise generate a ssh key and point to the file.
- Create a folder where you would like your synced filed and point to it. 

#### homstead.yml example
```
---
ip: "192.168.10.10"
memory: 2048
cpus: 2
provider: virtualbox

folders:
    - map: C:\Users\YourUser\Documents\Web-Projects\
      to: /home/vagrant/code/

sites:
    - map: joblink.test
      to: /home/vagrant/code/joblink/public
```

- Run `vagrant up` in the homestead folder.

- Clone the repository to your synced folder (for example "C:\Users\YourUser\Documents\Web-Projects\JobLink") using `git clone https://github.com/jc444304/cp3405-tiny.git .`.

- SSH into your machine using `vagrant ssh` .

- Create a database using `mysql -u root -p`; enter `secret` and `create database joblink;` .

- Make sure the .env file in your joblink directory points to your database.
#### .env example
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=joblink
DB_USERNAME=root
DB_PASSWORD=secret
```

- In the machine run `composer install` from the synced folder to install dependencies.

- Run `php artisan migrate --seed` to populate the database with tables and example entries.

- Run `php artisan storage:link` to enable the images to be uploaded and displayed correctly.

- Optionally add joblink.test to your hosts files, otherwise access the website at [192.168.10.10](http://192.168.10.10)
