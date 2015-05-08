DROP DATABASE if exists cookingwithfriends;
create database if not exists cookingwithfriends;
	use cookingwithfriends;

	-- user
	create table user(
		email varchar(255),
		has_kitchen Boolean,
		address varchar(255),
		PRIMARY KEY (email)
	);

	-- Events
	create table event(
		e_id integer AUTO_INCREMENT,
		e_name varchar(255),
		date_time DATETIME,
		address varchar(255),
		PRIMARY KEY (e_id)
	);
	
	-- Attending relation between user and event
	create table attending(
		email varchar(255),
		e_id integer,
		PRIMARY KEY (email, e_id),
		FOREIGN KEY (email) REFERENCES user(email),
		FOREIGN KEY (e_id) REFERENCES event(e_id)
	);