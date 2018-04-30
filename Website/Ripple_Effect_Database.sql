CREATE DATABASE Ripple_Effect;

CREATE TABLE STUDENT(
    S_ID                int(6)          NOT NULL AUTO_INCREMENT,
    F_Name              varchar(25)     CHARACTER SET utf8mb4   NOT NULL,
    L_Name              varchar(25)     CHARACTER SET utf8mb4   NOT NULL,
    Username            varchar(25)     CHARACTER SET utf8      NOT NULL,
    Password            varchar(16)     CHARACTER SET utf8      NOT NULL,
    Email               varchar(50)     CHARACTER SET utf8      NOT NULL,
    S_Phone_Number      int(10)         CHARACTER SET utf8      NOT NULL,
PRIMARY KEY (S_ID)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1

CREATE TABLE VENDOR(
    V_ID               int(6)          NOT NULL AUTO_INCREMENT,
    V_Name             varchar(25)     CHARACTER SET utf8mb4     NOT NULL,
    V_Address          varchar(25)     CHARACTER SET utf8mb4     NOT NULL,
    V_State            varchar(25)     CHARACTER SET utf8mb4     NOT NULL,
    Username           varchar(25)     CHARACTER SET utf8        NOT NULL,
    Password           varchar(16)     CHARACTER SET utf8        NOT NULL,
    Email              varchar(50)     CHARACTER SET utf8        NOT NULL,
    V_Phone_Number     int(11)         CHARACTER SET utf8        NOT NULL,
    V_Service          varchar(25)     CHARACTER SET utf8mb4     NOT NULL,
PRIMARY KEY (V_ID)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1

CREATE TABLE REVIEW(
    Review_ID          int(8)          NOT NULL AUTO_INCREMENT,
    V_Name             varchar(100)    NOT NULL,
    V_Rating           int(1)          NOT NULL,
    V_Review           varchar(300)    CHARACTER SET utf8        NOT NULL,
    V_ID` int(6)                       NOT NULL,
    PRIMARY KEY (Review_ID),
CONSTRAINT V_ID FOREIGN KEY (V_ID) REFERENCES VENDOR (V_ID)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1
