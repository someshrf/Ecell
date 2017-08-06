//MySQL Commands:: //creating Database: create database 'ecell';

//establish connection with server::

$db = mysqli_connect('localhost','username','password','database name'(here- ecell));

//creating table for users: create table users (id INT(11) PRIMARY KEY AUTO_INCREMENT, name VARCHAR(255), phone VARCHAR(255), email VARCHAR(255),dept VARCHAR(255),year VARCHAR(255),filename VARCHAR(255), filecon MEDIUMBLOB);
