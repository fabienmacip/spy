DROP TABLE mission_planque;
DROP TABLE mission_personne;
DROP TABLE mission;
DROP TABLE planque;
DROP TABLE type_de_mission;
DROP TABLE administrateur;
DROP TABLE agent_specialite;
DROP TABLE specialite;
DROP TABLE personne;
DROP TABLE pays;

/** DB creation */
 
CREATE TABLE pays (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nom varchar(50)
);
 
CREATE TABLE personne (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(40) NOT NULL,
  prenom VARCHAR(30) NOT NULL,
  dob DATE,
  secret_code VARCHAR(20) NOT NULL,
  nationalite INT NOT NULL,
  type enum('agent','cible','contact') NOT NULL,
  FOREIGN KEY (nationalite) REFERENCES pays (id)
);

CREATE TABLE specialite (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  	intitule VARCHAR(50) NOT NULL
);

CREATE TABLE agent_specialite (
 	id_agent INT NOT NULL,
  	id_specialite INT NOT NULL,
	FOREIGN KEY (id_agent) REFERENCES personne (id),
  	FOREIGN KEY (id_specialite) REFERENCES specialite (id)
);

CREATE TABLE administrateur (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(40) NOT NULL,
  prenom VARCHAR(30) NOT NULL,
  mail VARCHAR(50) NOT NULL,
  date_creation DATE NOT NULL,
  mot_de_passe VARCHAR(40) NOT NULL
);

CREATE TABLE type_de_mission (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  intitule VARCHAR(60)
);

CREATE TABLE planque (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  code VARCHAR(30) NOT NULL,
  adresse VARCHAR(50) NOT NULL,
  ville VARCHAR(50) NOT NULL,
  pays INT NOT NULL,
  FOREIGN KEY (pays) REFERENCES pays (id)
);

CREATE TABLE mission (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  titre VARCHAR(60) NOT NULL,
  description TEXT(300),
  nom_de_code VARCHAR(40) NOT NULL,
  pays INT NOT NULL,
  specialite INT NOT NULL,
  type_de_mission INT NOT NULL,
  date_debut DATE,
  date_fin DATE,
  statut enum('en préparation','en cours','terminée','échec') NOT NULL,
  FOREIGN KEY (pays) REFERENCES pays (id),
  FOREIGN KEY (specialite) REFERENCES specialite (id),
  FOREIGN KEY (type_de_mission) REFERENCES type_de_mission (id)    
);

CREATE TABLE mission_personne(
 	id_mission INT NOT NULL,
  	id_personne INT NOT NULL,
	FOREIGN KEY (id_mission) REFERENCES mission (id),
  	FOREIGN KEY (id_personne) REFERENCES personne (id)
);

CREATE TABLE mission_planque(
 	id_mission INT NOT NULL,
  	id_planque INT NOT NULL,
	FOREIGN KEY (id_mission) REFERENCES mission (id),
  	FOREIGN KEY (id_planque) REFERENCES planque (id)
);


/* DONNEES */

INSERT INTO pays (nom) VALUES ('France');
INSERT INTO pays (nom) VALUES ('Espagne');
INSERT INTO pays (nom) VALUES ('Belgique');
INSERT INTO pays (nom) VALUES ('Suisse');

INSERT INTO personne (nom,prenom,dob,secret_code,nationalite,type) VALUES ('Dupont','Jean','1998-03-10','dd007','2','agent');
INSERT INTO personne (nom,prenom,dob,secret_code,nationalite,type) VALUES ('Richardson','Mike','1980-05-25','ricardo','1','agent');
INSERT INTO personne (nom,prenom,dob,secret_code,nationalite,type) VALUES ('Gomez','Lucien','1970-05-25','bout de gomme','4','cible');
INSERT INTO personne (nom,prenom,dob,secret_code,nationalite,type) VALUES ('Rodrigues','Ginette','2000-06-25','Rodgi421','2','cible');
INSERT INTO personne (nom,prenom,dob,secret_code,nationalite,type) VALUES ('Martinez','Julio','1985-09-20','juma','3','contact');
INSERT INTO personne (nom,prenom,dob,secret_code,nationalite,type) VALUES ('Borg','Bjon','1978-06-01','bibi','1','contact');

INSERT INTO specialite (intitule) VALUES ('snipper');
INSERT INTO specialite (intitule) VALUES ('filature');
INSERT INTO specialite (intitule) VALUES ('empoisonnement');
INSERT INTO specialite (intitule) VALUES ('traçage numérique');
INSERT INTO specialite (intitule) VALUES ('transformisme');

INSERT INTO agent_specialite (id_agent, id_specialite) VALUES (1,1);
INSERT INTO agent_specialite (id_agent, id_specialite) VALUES (1,3);
INSERT INTO agent_specialite (id_agent, id_specialite) VALUES (2,4);

INSERT INTO administrateur (nom,prenom,mail,date_creation,mot_de_passe) VALUES ('Macip','Fabien','fabien.macip@gmail.com','2021-09-19','toto');
INSERT INTO administrateur (nom,prenom,mail,date_creation,mot_de_passe) VALUES ('Tyson','Lucile','lulutyson@free.fr','2020-12-25','miky');

INSERT INTO type_de_mission (intitule) VALUES ('Assassinat');
INSERT INTO type_de_mission (intitule) VALUES ('Vol');
INSERT INTO type_de_mission (intitule) VALUES ('Rapt');
INSERT INTO type_de_mission (intitule) VALUES ('Copie numérique');
INSERT INTO type_de_mission (intitule) VALUES ('Surveillance');
INSERT INTO type_de_mission (intitule) VALUES ('Infiltration');
INSERT INTO type_de_mission (intitule) VALUES ('Copie numérique');
INSERT INTO type_de_mission (intitule) VALUES ('Usurpation identité');

INSERT INTO planque (code, adresse, ville, pays) VALUES ('Cygogne38','3 rue des charmes','Paris',1);
INSERT INTO planque (code, adresse, ville, pays) VALUES ('cinéma101','49 avenue des chocolats','Bruxelles',3);

INSERT INTO mission (titre, description, nom_de_code, pays, specialite, type_de_mission, date_debut, date_fin, statut) VALUES ('Vol de clés','Dérober le double des clés du coffre du KGB, auprès de l ambassadeur de Russie, basé à Bruxelles','frite codée',3,2,6,'2021-09-01','2021-10-15','en préparation');
INSERT INTO mission (titre, description, nom_de_code, pays, specialite, type_de_mission, date_debut, date_fin, statut) VALUES ('La place du roi','Infiltrer le palais royal et se faire passer pour le roi afin de donner des ordres militaires','kingdom',1,5,8,'2021-08-15','2022-02-05','en préparation');

INSERT INTO mission_personne (id_mission, id_personne) VALUES (1,1);
INSERT INTO mission_personne (id_mission, id_personne) VALUES (1,3);
INSERT INTO mission_personne (id_mission, id_personne) VALUES (1,5);
INSERT INTO mission_personne (id_mission, id_personne) VALUES (2,2);
INSERT INTO mission_personne (id_mission, id_personne) VALUES (2,4);
INSERT INTO mission_personne (id_mission, id_personne) VALUES (2,6);

INSERT INTO mission_planque (id_mission, id_planque) VALUES (1,2);
INSERT INTO mission_planque (id_mission, id_planque) VALUES (2,1);

/** DB query */
SELECT *
FROM pays;

SELECT *
FROM personne;

SELECT *
FROM specialite;

SELECT *
FROM agent_specialite;

SELECT p.nom, s.intitule
FROM personne p, specialite s, agent_specialite ag
WHERE ag.id_agent = p.id AND ag.id_specialite = s.id;

SELECT * 
FROM administrateur;

SELECT *
FROM type_de_mission;

SELECT *
FROM planque;

SELECT *
FROM mission;

SELECT *
FROM mission_personne;

SELECT *
FROM mission_planque;