create table users(
	username varchar(100),
	password varchar(100)
);
insert into users (username,password) values("root","root");

create table articles(
	writer varchar(100),
    title varchar(100),
    content varchar(5000)
);
insert into articles(writer,title,content) values("root","test","test test 123");