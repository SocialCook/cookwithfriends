create database cookingwithfriends;
	use cookingwithfriends;

	--User
	create table user(
		u_id int NOT NULL AUTO_INCREMENT,
		password varchar(32),
		name varchar(255),
		email varchar(255),
		PRIMARY KEY (u_id),
		UNIQUE (email)
	);

	--Kitchen objects
	create table tools(
		t_id int NOT NULL AUTO_INCREMENT,
		name varchar(255),
		description varchar(255),
		essential int,
		PRIMARY KEY (t_id)
	);

	--Relation between User and Kitchen Object
	create table owns(
		u_id int,
		t_id int,
		FOREIGN KEY (u_id) REFERENCES user(u_id),
		FOREIGN KEY (t_id) REFERENCES tools(t_id),
		PRIMARY KEY (u_id, t_id)
	);

	--Events
	create table event(
		e_id NOT NULL AUTO_INCREMENT,
		edt datetime,
		address varchar(255),
		meal varchar(255)
		PRIMARY KEY (e_id)
	);

	create table host(
		u_id int,
		e_id int,
		FOREIGN KEY (u_id) REFERENCES user(u_id),
		FOREIGN KEY (e_id) REFERENCES event(e_id),
		PRIMARY KEY (u_id, e_id)
	);