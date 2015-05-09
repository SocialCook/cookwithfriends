DROP DATABASE if exists cookingwithfriends;
create database if not exists cookingwithfriends;
	use cookingwithfriends;
	-- user
	create table user(
		user_id int,
		has_kitchen int,
		address varchar(1000),
		PRIMARY KEY (email)
	);
	-- Events
	create table event(
		e_id integer AUTO_INCREMENT,
		e_name varchar(255),
		date_time DATETIME,
		address varchar(1000),
		PRIMARY KEY (e_id)
	);
	-- Attending relation between user and event
	create table attending(
		user_id int,
		e_id integer,
		PRIMARY KEY (user_id, e_id),
		FOREIGN KEY (user_id) REFERENCES user(user_id),
		FOREIGN KEY (e_id) REFERENCES event(e_id)
	);