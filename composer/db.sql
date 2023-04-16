CREATE TABLE movies(
    moviesId INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    englishTitle VARCHAR(255) NOT NULL
) ENGINE=INNODB;

CREATE TABLE Languages(
        languageId  INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        languageCode  VARCHAR (3) NOT NULL ,
        languageName VARCHAR(50) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE Movies_Languages(
        movieId     Int NOT NULL ,
        languageId  Int NOT NULL ,
        title       Varchar (250) NOT NULL ,
        description Text(500) NOT NULL ,
        poster      Varchar (250) NOT NULL,
	    FOREIGN KEY (movieId) REFERENCES movies(movieId),
        FOREIGN KEY (languageId) REFERENCES languages(languageId)
)ENGINE=InnoDB;


CREATE TABLE users(
     userId    Int(11)  Auto_increment  PRIMARY KEY NOT NULL ,
     userName  Varchar (250) NOT NULL,
     email  Varchar (250) NOT NULL,
     pwd  Varchar (250) NOT NULL,
     photo VARCHAR(255) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE photos(
    photoId INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    path VARCHAR(255) NOT NULL,
    userId INT NOT NULL,
    FOREIGN KEY (userId) REFERENCES users(userId)
) ENGINE=INNODB;

ALTER TABLE users
ADD COLUMN photo VARCHAR(255);

