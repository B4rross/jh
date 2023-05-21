CREATE TABLE User (
    idUser INT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    username VARCHAR(255),
    email VARCHAR(255),
    pass TEXT NOT NULL,
    roles ENUM('client', 'agent', 'admin'),
    UNIQUE(username, email)
);

CREATE TABLE Admine (
    idAdmin INT PRIMARY KEY,
    idUser INT,
    CONSTRAINT fk_userr FOREIGN KEY (idUser) REFERENCES User(idUser) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Hashtags (
    idHashtag INT PRIMARY KEY,
    hashtag VARCHAR(255) UNIQUE
);

CREATE TABLE Department (
    idAdmin INT,
    idDepartment INT,
    Department VARCHAR(255),
    CONSTRAINT pk_depart PRIMARY KEY (idDepartment),
    CONSTRAINT fk_role FOREIGN KEY (idAdmin) REFERENCES Admine(idAdmin) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Agent (
    idAgent INT PRIMARY KEY,
    idUser INT,
    idDepartment INT,
    CONSTRAINT fk_user5 FOREIGN KEY (idUser) REFERENCES User(idUser) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_depart FOREIGN KEY (idDepartment) REFERENCES Department(idDepartment) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Ticket (
    idTicket INT PRIMARY KEY,
    idUsername INT,
    datas DATE NOT NULL,
    assignedAgent INT,
    idDepartment INT,
    sttus ENUM('new', 'queued', 'inProg', 'Pending', 'resolved', 'closed'),
    priorit ENUM('low', 'medium', 'high'),
    mensagem TEXT NOT NULL,
    CONSTRAINT fk_username FOREIGN KEY (idUsername) REFERENCES User(idUser) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_agent FOREIGN KEY (assignedAgent) REFERENCES Agent(idAgent) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_depar FOREIGN KEY (idDepartment) REFERENCES Department(idDepartment) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Ticket_hashtag (
    idTicket INT,
    idHashtag INT,
    CONSTRAINT fk_ticketsa FOREIGN KEY (idTicket) REFERENCES Ticket(idTicket) ON UPDATE CASCADE,
    CONSTRAINT fk_hastagss FOREIGN KEY (idHashtag) REFERENCES Hashtags(idHashtag) ON UPDATE CASCADE
);

CREATE TABLE Change_depart (
    idTicket INT,
    idAgente INT,
    idDepartment INT,
    CONSTRAINT fk_ticketsss FOREIGN KEY (idTicket) REFERENCES Ticket(idTicket) ON UPDATE CASCADE,
    CONSTRAINT fk_agentex FOREIGN KEY (idAgente) REFERENCES Agent(idAgent) ON UPDATE CASCADE,
    CONSTRAINT fk_departamento FOREIGN KEY (idDepartment) REFERENCES Department(idDepartment) ON UPDATE CASCADE
);

CREATE TABLE Change_status (
    idTicket INT,
    idAgente INT,
    sttus ENUM('new', 'queued', 'inProg', 'Pending', 'resolved', 'closed'),
    CONSTRAINT fk_bilhete FOREIGN KEY (idTicket) REFERENCES Ticket(idTicket) ON UPDATE CASCADE,
    CONSTRAINT fk_agentex1 FOREIGN KEY (idAgente) REFERENCES Agent(idAgent) ON UPDATE CASCADE
);

CREATE TABLE Change_roles(
    idUser INT,
    idAdmin INT,
    roles ENUM('client', 'agent', 'admin'),
    CONSTRAINT fk_iduser3 FOREIGN KEY (idUser) REFERENCES User(idUser) ON UPDATE CASCADE,
    CONSTRAINT fk_agentex5 FOREIGN KEY (idAdmin) REFERENCES Admine(idAdmin) ON UPDATE CASCADE
);

CREATE TABLE FAQ (
    id INT PRIMARY KEY,
    quest VARCHAR(255) NOT NULL,
    ans VARCHAR(255) NOT NULL
);

INSERT INTO User (nome, username, email, pass, roles) VALUES ('Agent 1', 'agent1', 'agent1@example.com', 'password7', 'agent');
INSERT INTO User (nome, username, email, pass, roles) VALUES ('Agent 2', 'agent2', 'agent2@example.com', 'password8', 'agent'),
INSERT INTO User (nome, username, email, pass, roles) VALUES ('Agent 3', 'agent3', 'agent3@example.com', 'password9', 'agent');
INSERT INTO User (nome, username, email, pass, roles) VALUES ('Agent 4', 'agent4', 'agent4@example.com', 'password10', 'agent');
INSERT INTO User (nome, username, email, pass, roles) VALUES ('Agent 5', 'agent5', 'agent5@example.com', 'password11', 'agent');
INSERT INTO User (nome, username, email, pass, roles) VALUES ('Agent 6', 'agent6', 'agent6@example.com', 'password12', 'agent');
INSERT INTO User (nome, username, email, pass, roles) VALUES ('Ricardo Carodoso', 'Ricaestrondo45', 'up202108786@up.pt', 'RicCardoso78', 'admin');
INSERT INTO User (nome, username, email, pass, roles) VALUES ('Pedro Barros', 'PapiBarros', 'papibarros0945@gmail.com', 'DjPedBarros', 'admin');
INSERT INTO User (nome, username, email, pass, roles) VALUES ('Matilde Faro', '_.mtfp._09', 'matiiifaro59@sapo.pt', 'matifaro5123', 'admin');
INSERT INTO Admine (idUser) VALUES (7);
INSERT INTO Admine (idUser) VALUES (8);
INSERT INTO Admine (idUser) VALUES (9);
INSERT INTO Department (idAdmin, Department) VALUES (1, Sales);
INSERT INTO Department (idAdmin, Department) VALUES (1, Support);
INSERT INTO Department (idAdmin, Department) VALUES (1, Marketing);
INSERT INTO Department (idAdmin, Department) VALUES (1, Finance);
INSERT INTO Hashtags (hashtag) VALUES (tickets);
INSERT INTO Hashtags (hashtag) VALUES (science);
INSERT INTO Hashtags (hashtag) VALUES (module);
INSERT INTO Hashtags (hashtag) VALUES (biology);
INSERT INTO Hashtags (hashtag) VALUES (chemistry);
INSERT INTO Agent (idUser, idDepartment) VALUES (1, 1);
INSERT INTO Agent (idUser, idDepartment) VALUES (2, 1);
INSERT INTO Agent (idUser, idDepartment) VALUES (3, 2);
INSERT INTO Agent (idUser, idDepartment) VALUES (4, 2);
INSERT INTO Agent (idUser, idDepartment) VALUES (5, 3);
INSERT INTO Agent (idUser, idDepartment) VALUES (6, 4);