1. Clone the Github repository to a desired location on your computer. You will need [git](https://git-scm.com/) to be preinstalled on your machine. Once the repository is cloned, you will then ```cd``` into the local repository.
 ```
 git clone https://github.com/Swaranjali167/Jobify.git
 ```
2. After Cloning the Github repository (git clone https://github.com/Swaranjali167/Jobify) to a desired location on your computer. Please follow the steps given below to set up the project to a working condition.

### Now with support for docker-compose! 
If you don't want to download mysql, or XAMPP locally, all you need is Docker installed to do these steps. 

- the only file you'll need to edit is [here](./code/Scraper/main.py) for the admins email id and password
- in the root directory, run:
  ```
  docker-compose up
  ```
  and then head over to http://localhost:8080 and your application is up and running! 

### Traditional installation
- Host your MySQL DB using an application by following these steps.
  * **Create a MySQL instance in your local** 
    + [Installation instruction for local](https://dev.mysql.com/doc/mysql-getting-started/en/#mysql-getting-started-installing)
  or
  * **Create a MySQL instance in AWS**
    + [Installation instruction AWS](https://www.youtube.com/watch?v=Ng_zi11N4_c)
- Execute Jobify/code/Database/schema/srijas.sql file in the created db
- Update your DB credentials in the db.properties.template file.
- Provide executable permissions for setup.sh and execute the file.
- Update the admin's email ID and password in the main.py file for sending job notification mail.

This will install all the required packages from requirements.txt and create a parameters.json file which is required for accessing the DB.
- You can either choose to host the project on any online hosting platform or use an application to test the application locally. We used two applications to host the webpage in local -> XAMPP and MAMP Pro
  * [MAMP Pro](https://www.mamp.info/en/downloads/)
    + [Installation instructions](https://documentation.mamp.info/en/MAMP-PRO-Mac/)
  * [XAMPP](https://www.apachefriends.org/download.html)
    + If you wish to use XAMPP, download the application and click on the Config button (see picture below)
    
      <img width="607" alt="xampp-conf" src="https://user-images.githubusercontent.com/28624935/143979475-f2d4b1d6-297c-43ff-8cb5-d243e59ebc57.png">
    + Click the Apache(httpd.conf) file and add the your project's directory under "DocumentRoot:"
      ```
        DocumentRoot ".../Jobify/code/Web_app"
        <Directory ".../Jobify/code/Web_app">
      ```
- After setting up the project, create executable permissions for the following files - run_notifier.sh and start_server.sh
  * To run the job notifier once -> execute run_notifier.sh
  * To run the scheduler -> execute start_server.sh

- You should be good to start working on the application now.

