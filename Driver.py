# Importing necessary modules
import mysql.connector
import numpy as np
import names
from datetime import datetime
from numpy.random import choice

# Storing current time
now = datetime.now()
current_time = now.strftime("%H:%M")

# Connecting mysql
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password=""
)

# Cursor
mycursor = mydb.cursor()

# Creating database
#mycursor.execute("CREATE DATABASE Drivers")

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="mandicab"
)

mycursor = mydb.cursor()

# Creating table
mycursor.execute("CREATE TABLE Driver (ID int primary key, Name varchar(255) not null, StartingTime TIME not null, EndingTime TIME not null, City varchar(255) not null, Car varchar(255) not null)")

# format for inserting
sql = "INSERT INTO Driver (ID, Name, StartingTime, EndingTime, City, Car) VALUES (%s, %s, %s, %s, %s, %s)"

# list of car and city
car = ["Sedan", "SUV", "Luxury", "Mini"]
city = ["Indore", "Raipur", "Mumbai", "Mandi", "Delhi", "Banglore", "Pune", "Chennai", "Chandigarh", "Kashmir", "Bhopal", "Hyderabad", "Dhanbad", "Gandhi Nagar", "Kolkata"]

# For loop to insert values in table
for i in range(1000):
    if(i<500):
        s= "00:01"
        e= "12:00"
    else:
        s= "12:01"
        e= "23:59"
    loc = choice(city)
    vec = choice(car)
    val = ((i+1), names.get_full_name(gender='male'), s, e,  str(loc), str(vec))       #current_time
    mycursor.execute(sql, val)
    mydb.commit()

mycursor.execute("CREATE TABLE Driverinfo as (select ID, Name, Car from driver)")
#sql1 = "INSERT INTO Driverinfo (ID, Name, Car) VALUES (select ID from driver, select Name from driver, select Car from driver)"
