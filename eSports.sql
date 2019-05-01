create table Player
	(player_ID int not null AUTO_INCREMENT,
	name varchar(30) not null,
	bio varchar(255),
	birth_date date,
	primary key (player_ID)
	);

create table Team
	(team_ID int not null AUTO_INCREMENT,
	name varchar(30) not null,
	primary key (team_ID)
	);

create table Game
	(game_ID int not null AUTO_INCREMENT,
	game_name varchar(30) not null,
	publisher varchar(30),
	release_date date,
	primary key (game_ID)
	);

create table TeamStatType
	(teamStat_Name varchar(30) not null,
	value_type varchar(30),
	primary key (teamStat_Name)
	);

create table PlayerStatType
	(playerStat_Name varchar(30),
	value_type varchar(30),
	primary key (playerStat_Name)
	);

create table TeamStats
	(value varchar(30),
	time_stamp timestamp not null,
	teamStat_Name varchar(30) not null,
	team_ID int not null,
	game_ID int not null,
	foreign key (teamStat_Name) references TeamStatType(teamStat_Name),
	foreign key (team_ID) references Team(team_ID),
	foreign key (game_ID) references Game(game_ID)
);

create table PlayerStats
	(value varchar(30),
	time_stamp timestamp,
	playerStat_Name varchar(30) not null,
	player_ID int not null,
	game_ID int not null,
	foreign key (playerStat_Name) references PlayerStatType(playerStat_Name),
	foreign key (player_ID) references Player(player_ID),
	foreign key (game_ID) references Game(game_ID)
	);

Create table Members
	(player_ID int,
	team_ID int,
	foreign key (player_ID) references Player(player_ID),
	foreign key (team_ID) references Team(team_ID)
	);
