<h1 align="center"> Simple Gym System </h1>
<p align="center">
   <img src="https://user-images.githubusercontent.com/93389016/157983116-9feca44c-b9c1-43a0-97f3-e40fb90d685f.png" alt="Build Status">
</p>

## Description:
 
The Simple Gym Management System In Laravel/MySQL is a mini project for keeping records of members in the gym. Talking about the project, it contains an admin side from where can manage all the timetables and records of the gym users easily.  

&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; `The administration part consists of 4 types of managers who can enter the system`  

1- `Admin`  :    
&nbsp; &nbsp; &nbsp; &nbsp; Admin will have access to everything in the system,he can see any links or make any action Gym Manager   
&nbsp; &nbsp; &nbsp; &nbsp; and City Manager can do with these extra functionalities.    

2- `City Manager` :    
&nbsp; &nbsp; &nbsp; &nbsp; City Manager can do what Gym Manager do with extra functionalities … like he can see all gyms in his city and  
&nbsp; &nbsp; &nbsp; &nbsp; make CRUD on any gym or gym manager in his city.  

3- `Gym Managers` :  
&nbsp; &nbsp; &nbsp; &nbsp; Gym Manager can CRUD training sessions and assign coaches to these sessions, also he can buy training  
&nbsp; &nbsp; &nbsp; &nbsp; package for a user through stripe.  

4- `coach` :  
&nbsp; &nbsp; &nbsp; &nbsp; Can only see the sessions in which he trains.  

5- `User` (It will be API only) :  
&nbsp; &nbsp; &nbsp; &nbsp; Cann't access the system because it is for the administration only, but there is an endpoint (API) for the user.   

&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; `Each manager has Permissions that can be found in the following table`
<h3 align="center"> Databas Permissions </h3>  					
<p align="center">
   <img src="https://user-images.githubusercontent.com/93389016/156779278-58d23b62-21df-436d-a271-da2c5ad33c5d.png" alt="Build Status">
</p>

## To run this project  

`Step 1` :  
&nbsp; &nbsp; &nbsp; &nbsp; You must have installed virtual server i.e XAMPP on your PC (for Windows). This System in PHP with source code   
&nbsp; &nbsp; &nbsp; &nbsp; is free to download, Use for educational purposes only! .  

`Step 2` :  
&nbsp; &nbsp; &nbsp; &nbsp; Download the source code .

`Step 3` :  
&nbsp; &nbsp; &nbsp; &nbsp; Create database call `gym` .  

&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  `To help you understand the project databases, see the following ERF`
<h3 align="center"> DataBase ERD </h3>
<p align="center">
   <img src="https://user-images.githubusercontent.com/93389016/157979950-d67cd8ca-0e50-4ca0-9c6c-263883ad1a73.jpg" alt="Build Status">
</p>

`Step 4` :    
&nbsp; &nbsp; &nbsp; &nbsp; update composer by use a command ` $ composer update `.  

`Step 5` :    
&nbsp; &nbsp; &nbsp; &nbsp; Run migration to create dababas tables use a command ` $ php artisan migrate `.

`Step 6` :    
&nbsp; &nbsp; &nbsp; &nbsp; Run data seed to create fake data in your database use a command ` $ php artisan db:seed `.  

OR you can shorten the previous two steps (5 , 6) by using this command ` $ php artisan migrate:fresh --seed `.  


- Now `226` Accounts have been created on the system, distributed as follows :  
The first two accounts are for `admin`.    
From 3 to 26 are `cityManager`.  
From 27 to 66 are `gymManager`.  
From 67 to 126 are `coach`.  
From 127 to 226 are `user`.  
All created accounts have a unified password `123456`.  


`Step 7`:    
&nbsp; &nbsp; &nbsp; &nbsp; To create a new admin account use a command  

&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ` $ php artisan create:admin --email=admin2@admin.com --password=123456 `.  

`Step 8`:    
&nbsp; &nbsp; &nbsp; &nbsp; Run schedule use a command `php artisan schedule:work`   
&nbsp; &nbsp; &nbsp; &nbsp; then use a command `php artisan notify:users-not-logged-in-for-month`






## Contributors
<table>
   <tr>
    <td>
      <img src="https://avatars.githubusercontent.com/u/93389016?v=4"></img>
    </td>
    <td>
      <img src="https://avatars.githubusercontent.com/u/97949259?v=4"></img>
    </td>
    <td>
      <img src="https://avatars.githubusercontent.com/u/97365136?v=4"></img>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/MohamedAlabasy"> Mohamed Alabasy </a>
    </td>
      <td>
      <a href="https://github.com/dinaredaelsebaey"> Dina Reda </a>
    </td>
     <td>
      <a href="https://github.com/MaiiEmad"> Mai Emad </a>
    </td>
  </tr>
  <tr>
    <td>
      <img src="https://avatars.githubusercontent.com/u/97946354?v=4"></img>
    </td>
    <td>
      <img src="https://avatars.githubusercontent.com/u/95267859?v=4"></img>
    </td>
    <td>
      <img src="https://avatars.githubusercontent.com/u/58011505?v=4"></img>
    </td>
  </tr>
  <tr>
    <td>
      <a href="https://github.com/Hala-salah77"> Hala Salah </a>
    </td>
      <td>
      <a href="https://github.com/gehad300"> Gehad </a>
    </td>
     <td>
      <a href="https://github.com/MahmoudNehro"> Mahmoud Nehro </a>
    </td>
  </tr>
</table>
