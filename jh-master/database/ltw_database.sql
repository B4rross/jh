PRAGMA foreign_keys = on;
BEGIN TRANSACTION;

DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Ticket;
DROP TABLE IF EXISTS Department;
DROP TABLE IF EXISTS Agent;
DROP TABLE IF EXISTS Admine;
DROP TABLE IF EXISTS Hashtags;
DROP TABLE IF EXISTS Ticket_hashtag;
DROP TABLE IF EXISTS Change_depart;
DROP TABLE IF EXISTS Change_status;
DROP TABLE IF EXISTS Change_roles;

CREATE TABLE User (
    idUser INTEGER,
    nome TEXT NOT NULL,
    username TEXT UNIQUE,
    email TEXT UNIQUE,
    pass TEXT NOT NULL,
    roles TEXT CHECK (roles = 'client' OR roles = 'agent' OR roles = 'admin'),
    CONSTRAINT pk_user PRIMARY KEY (idUser)
);

CREATE TABLE Admine (
    idAdmin INTEGER,
    idUser INTEGER,
    CONSTRAINT pk_admin PRIMARY KEY (idAdmin),
    CONSTRAINT fk_userr FOREIGN KEY (idUser) REFERENCES User(idUser) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Department (
    idAdmin INTEGER,
    idDepartment INTEGER,
    Department TEXT UNIQUE,
    CONSTRAINT pk_depart PRIMARY KEY (idDepartment),
    CONSTRAINT fk_role FOREIGN KEY (idAdmin) REFERENCES Admine(idAdmin) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Hashtags (
    idHashtag INTEGER,
    hashtag TEXT UNIQUE,
    CONSTRAINT pk_hashtag PRIMARY KEY (idHashtag)
);

CREATE TABLE Agent (
    idAgent INTEGER,
    idUser INTEGER,
    idDepartment INTEGER,
    CONSTRAINT pk_agent PRIMARY KEY (idAgent),
    CONSTRAINT fk_user5 FOREIGN KEY (idUser) REFERENCES User(idUser) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_depart FOREIGN KEY (idDepartment) REFERENCES Department(idDepartment) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Ticket (
    idTicket INTEGER,
    idUsername INTEGER,
    datas DATE NOT NULL,
    assignedAgent INTEGER,
    idDepartment INTEGER,
    sttus TEXT CHECK(sttus = 'new' OR sttus = 'queued' OR sttus = 'inProg' OR sttus = 'Pending' OR sttus = 'resolved' OR sttus = 'closed'),
    priorit TEXT CHECK(priorit = 'low' OR priorit = 'medium' OR priorit = 'high'),
    mensagem TEXT NOT NULL,
    CONSTRAINT pk_ticket PRIMARY KEY (idTicket),
    CONSTRAINT fk_username FOREIGN KEY (idUsername) REFERENCES User(idUser) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_agent FOREIGN KEY (assignedAgent) REFERENCES Agent(idAgent) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_depar FOREIGN KEY (idDepartment) REFERENCES Department(idDepartment) ON UPDATE CASCADE ON DELETE CASCADE
);


CREATE TABLE Ticket_hashtag (
    idTicket INTEGER,
    idHashtag INTEGER,
    CONSTRAINT fk_ticketsa FOREIGN KEY (idTicket) REFERENCES Ticket(idTicket) ON UPDATE CASCADE,
    CONSTRAINT fk_hastagss FOREIGN KEY (idHashtag) REFERENCES Hashtags(idHashtag) ON UPDATE CASCADE
);

CREATE TABLE Change_depart (
    idTicket INTEGER,
    idAgente INTEGER,
    idDepartment INTEGER,
    CONSTRAINT fk_ticketsss FOREIGN KEY (idTicket) REFERENCES Ticket(idTicket) ON UPDATE CASCADE,
    CONSTRAINT fk_agentex FOREIGN KEY (idAgente) REFERENCES Agent(idAgent) ON UPDATE CASCADE,
    CONSTRAINT fk_departamento FOREIGN KEY (idDepartment) REFERENCES Department(idDepartment) ON UPDATE CASCADE
);

CREATE TABLE Change_status (
    idTicket INTEGER,
    idAgente INTEGER,
    sttus TEXT CHECK(sttus = 'new' OR sttus = 'queued' OR sttus = 'inProg' OR sttus = 'Pending' OR sttus = 'resolved' OR sttus = 'closed'),
    CONSTRAINT fk_bilhete FOREIGN KEY (idTicket) REFERENCES Ticket(idTicket) ON UPDATE CASCADE,
    CONSTRAINT fk_agentex1 FOREIGN KEY (idAgente) REFERENCES Agent(idAgent) ON UPDATE CASCADE
);

CREATE TABLE Change_roles(
    idUser INTEGER,
    idAdmin INTEGER,
    roles TEXT CHECK (roles = 'client' OR roles = 'agent' OR roles = 'admin'),
    CONSTRAINT fk_iduser3 FOREIGN KEY (idUser) REFERENCES User(idUser) ON UPDATE CASCADE,
    CONSTRAINT fk_agentex5 FOREIGN KEY (idAdmin) REFERENCES Admine(idAdmin) ON UPDATE CASCADE
);

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;