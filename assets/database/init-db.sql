DROP DATABASE IF EXISTS rick_morty;
CREATE DATABASE IF NOT EXISTS rick_morty;
USE rick_morty;

DROP TABLE IF EXISTS character_, location, episode, travel, character_episode, character_travel;

CREATE TABLE location (
    id 			SMALLINT 		NOT NULL	AUTO_INCREMENT,
    name 		VARCHAR(50) 	NOT NULL,
    loc_type	VARCHAR(50)     NOT NULL,
    dimension 	VARCHAR(50)     NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE character_ (
    id 				SMALLINT 										NOT NULL	AUTO_INCREMENT,
    name 			VARCHAR(50) 									NOT NULL,
    status			ENUM('Alive','Dead','unknown')					NOT NULL,
    species			VARCHAR(50)										NOT NULL,
    gender			ENUM('Female','Male','Genderless','unknown')	NOT NULL,
    origin_loc_id	SMALLINT,
    last_loc_id		SMALLINT,
    FOREIGN KEY (origin_loc_id)	REFERENCES location (id)	ON DELETE CASCADE,
    FOREIGN KEY (last_loc_id)	REFERENCES location (id)	ON DELETE CASCADE,
    PRIMARY KEY (id)
);

CREATE TABLE episode (
    id     		SMALLINT 		NOT NULL	AUTO_INCREMENT,
    name 		VARCHAR(50) 	NOT NULL,
	air_date	DATE			NOT NULL,
	season_no	SMALLINT		NOT NULL,
	episode_no 	SMALLINT		NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE travel (
   id				SMALLINT	NOT NULL	AUTO_INCREMENT,
   episode_id		SMALLINT	NOT NULL,
   origin_loc_id  	SMALLINT,
   target_loc_id	SMALLINT	NOT NULL,
   FOREIGN KEY (episode_id)		REFERENCES episode (id)		ON DELETE CASCADE,
   FOREIGN KEY (origin_loc_id)	REFERENCES location (id)	ON DELETE CASCADE,
   FOREIGN KEY (target_loc_id)	REFERENCES location (id) 	ON DELETE CASCADE,
   PRIMARY KEY (id)
);
   
CREATE TABLE character_episode (
	id				INT			NOT NULL	AUTO_INCREMENT,
	character_id	SMALLINT	NOT NULL,
	episode_id		SMALLINT	NOT NULL,
	FOREIGN KEY (character_id)	REFERENCES character_ (id)	ON DELETE CASCADE,
   	FOREIGN KEY (episode_id)	REFERENCES episode (id) 	ON DELETE CASCADE,
   	PRIMARY KEY (id)
);

CREATE TABLE character_travel (
	id				INT			NOT NULL	AUTO_INCREMENT,
	character_id	SMALLINT	NOT NULL,
	travel_id		SMALLINT	NOT NULL,
	FOREIGN KEY (character_id)	REFERENCES character_ (id)	ON DELETE CASCADE,
   	FOREIGN KEY (travel_id)		REFERENCES travel (id) 		ON DELETE CASCADE,
   	PRIMARY KEY (id)
);
