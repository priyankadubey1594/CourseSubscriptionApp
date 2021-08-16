<?php

//query to create the database
$query = "create database if not exists SCR";

//query to create students table 
$query = "create table students (id int AUTO_INCREMENT PRIMARY KEY, firstName varchar(20), lastName varchar(20), dob date, contact varchar(15), createdOn datetime, updatedOn timestamp, UNIQUE `unique_index`(`contact`))" ;

//query to create courses table
$query = "create table courses(id int AUTO_INCREMENT PRIMARY KEY, courseName varchar(20), courseDetails varchar(200), createdOn datetime, updatedOn timestamp, UNIQUE `unique_course` (`courseName`))";

//query to create subscriptions table
$query = "create table subscriptions(id int AUTO_INCREMENT PRIMARY KEY, studentId int, courseId int ,subscribedOn datetime, FOREIGN Key (studentId) REFERENCES students(`id`) on DELETE cascade on update CASCADE, foreign Key (courseId) REFERENCES courses(`id`) on delete cascade on update cascade)";
?>