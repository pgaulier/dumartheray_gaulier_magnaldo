-- =====================================================================
--   Nom de la base   :  GESTION DES RELATIONS PARTENARIALES D'UNE ECOLE
--   Nom de SGBD      :  Oracle Version 7.0
--   Date de creation :  18/11/2016  11:38
-- =====================================================================

-- =====================================================================
--   Table : ENTREPRISE
-- =====================================================================
create table ENTREPRISE
(
	NUMERO_ENTREPRISE          NUMBER(3)              not null,
	NOM_ENTREPRISE		   CHAR(20)		  not null,
	ADRESSE			   CHAR(50)			  ,
	CODE_POSTAL		   NUMBER(10)		 	  ,
	VILLE_SIEGE		   CHAR(20)		 	  ,
	TELEPHONE		   CHAR(20)			  ,
	SITE_INTERNET		   CHAR(50)			  ,
	NOMBRE_EMPLOYES		   NUMBER(5)			  ,
	constraint pk_entreprise primary key (NUMERO_ENTREPRISE)
);

-- =====================================================================
--   Table : DESCRIPTION_ENTREPRISE
-- =====================================================================
create table DESCRIPTION_ENTREPRISE
(
	NUMERO_ENTREPRISE	   NUMBER(3)              not null,
	NUMERO_GENRE		   NUMBER(3)		  not null,
	constraint pk_description_entreprise primary key (NUMERO_ENTREPRISE, NUMERO_GENRE)
);

-- =====================================================================
--   Table : GENRE
-- =====================================================================
create table GENRE
(
	NUMERO_GENRE               NUMBER(3)              not null,
	TYPE_GENRE 		   CHAR(20)			  ,
	constraint pk_genre primary key (NUMERO_GENRE)
);

-- =====================================================================
--   Table : TAXE
-- =====================================================================
create table TAXE
(
	NUMERO_TAXE		   NUMBER(3)              not null,
	NUMERO_ENTREPRISE	   NUMBER(3)		  not null,
	MONTANT			   NUMBER(3)		  not null,
	ANNEE_VERSEMENT		   DATE				  ,
	constraint pk_taxe primary key (NUMERO_TAXE)
);

-- =====================================================================
--   Table : STAGE
-- =====================================================================
create table STAGE
(
	NUMERO_STAGE	           NUMBER(3)              not null,
	NUMERO_ENTREPRISE 	   NUMBER(3)		  not null,
	ID_CONTACT		   NUMBER(3) 		  not null,
	SUJET			   CHAR(50)		          ,
	DATE_DEBUT		   DATE				  ,
	DATE_FIN		   DATE				  ,
	constraint pk_stage primary key (NUMERO_STAGE)
);

-- =====================================================================
--   Table : DESCRIPTION_STAGE
-- =====================================================================
create table DESCRIPTION_STAGE
(
	NUMERO_TAG                 NUMBER(3)              not null,
	NUMERO_STAGE		   NUMBER(3)		  not null,
	constraint pk_description_stage primary key (NUMERO_TAG, NUMERO_STAGE)
);

-- =====================================================================
--   Table : TAG
-- =====================================================================
create table TAG
(
	NUMERO_TAG                 NUMBER(3)              not null,
	DESCRIPTION		   CHAR(20)		          ,
	constraint pk_tag primary key (NUMERO_TAG)
);

-- =====================================================================
--   Table : DESCRIPTION_STAGIAIRE
-- =====================================================================
create table DESCRIPTION_STAGIAIRE
(
	NUMERO_STAGE               NUMBER(3)              not null,
	ID_ELEVE		   NUMBER(3) 		  not null,
	constraint pk_description_stagiaire primary key (NUMERO_STAGE, ID_ELEVE)
);

-- =====================================================================
--   Table : PERSONNE
-- =====================================================================
create table PERSONNE
(
	ID_PERSONNE                NUMBER(3)              not null,
	NOM			   CHAR(20)		  not null,
	PRENOM			   CHAR(20)		          ,
	ADRESSE			   CHAR(20)			  ,
	TELEPHONE		   CHAR(20)			  ,
	MEL			   CHAR(40)			  ,
	constraint pk_personne primary key (ID_PERSONNE)
);

-- =====================================================================
--   Table : ELEVE
-- =====================================================================
create table ELEVE
(
	ID_ELEVE                   NUMBER(3)              not null,
	NUMERO_ECOLE		   NUMBER(3)		  not null,
	DEPARTEMENT		   CHAR(20)			  ,
	ANNEE_ETUDE		   NUMBER(1)			  ,
	PROMO			   CHAR(10)			  ,
	constraint pk_eleve primary key (ID_ELEVE)
);

-- =====================================================================
--   Table : CONTACT
-- =====================================================================
create table CONTACT
(
	ID_CONTACT                NUMBER(3)               not null,
	NUMERO_EVENEMENT	  NUMBER(3)		          ,
	FONCTION		  CHAR(20)			  ,
	constraint pk_contact primary key (ID_CONTACT)
);

-- =====================================================================
--   Table : DESCRIPTION_CONTACT
-- =====================================================================
create table DESCRIPTION_CONTACT
(
	NUMERO_ENTREPRISE          NUMBER(3)              not null,
	ID_CONTACT		   NUMBER(3) 		  not null,
	constraint pk_description_contact primary key (NUMERO_ENTREPRISE, ID_CONTACT)
);

-- =====================================================================
--   Table : LIAISON_ECOLE
-- =====================================================================
create table LIAISON_ECOLE
(
	NUMERO_ECOLE          NUMBER(3)              not null,
	ID_CONTACT		   NUMBER(3) 		  not null,
	constraint pk_liaison_ecole primary key (NUMERO_ECOLE, ID_CONTACT)
);


-- ====================================================================
--   Table : ECOLE
-- ====================================================================
create table ECOLE
(
	NUMERO_ECOLE               NUMBER(3)              not null,
	NOM			   CHAR(20)		  not null,
	TELEPHONE		   CHAR(20)		          ,
	ADRESSE			   CHAR(50)			  ,
	constraint pk_ecole primary key (NUMERO_ECOLE)
);

-- ====================================================================
--   Table : EVENEMENT
-- ====================================================================
create table EVENEMENT
(
	NUMERO_EVENEMENT	   NUMBER(3)              not null,
	NOM			   CHAR(20)		  not null,
	DATE_EVENEMENT		   DATE			  not null,
	constraint pk_evenement primary key (NUMERO_EVENEMENT)
);


-- =====================Liaisons====================

alter table TAXE
      add constraint fk1_taxe foreign key (NUMERO_ENTREPRISE)
      	  references ENTREPRISE (NUMERO_ENTREPRISE);

alter table DESCRIPTION_ENTREPRISE
      add constraint fk1_description_entreprise foreign key (NUMERO_ENTREPRISE)
      	  references ENTREPRISE (NUMERO_ENTREPRISE);

alter table DESCRIPTION_ENTREPRISE
      add constraint fk2_description_entreprise foreign key (NUMERO_GENRE)
      	  references GENRE (NUMERO_GENRE);

alter table DESCRIPTION_STAGE
      add constraint fk1_description_stage foreign key (NUMERO_STAGE)
      	  references STAGE (NUMERO_STAGE);

alter table DESCRIPTION_STAGE
      add constraint fk2_description_stage foreign key (NUMERO_TAG)
      	  references TAG (NUMERO_TAG);

alter table DESCRIPTION_STAGIAIRE
      add constraint fk1_description_stagiaire foreign key (NUMERO_STAGE)
      	  references STAGE (NUMERO_STAGE);

alter table DESCRIPTION_STAGIAIRE
      add constraint fk2_description_stagiaire foreign key (ID_ELEVE)
      	  references ELEVE (ID_ELEVE);

alter table ELEVE
      add constraint fk1_eleve foreign key (ID_ELEVE)
      	  references PERSONNE (ID_PERSONNE);

alter table ELEVE
      add constraint fk2_eleve foreign key (NUMERO_ECOLE)
      	  references ECOLE (NUMERO_ECOLE);

alter table CONTACT
      add constraint fk1_contact foreign key (ID_CONTACT)
      	  references PERSONNE (ID_PERSONNE);

alter table CONTACT
      add constraint fk2_contact foreign key (NUMERO_EVENEMENT)
      	  references EVENEMENT (NUMERO_EVENEMENT);

alter table LIAISON_ECOLE
      add constraint fk1_liaison_ecole foreign key (ID_CONTACT)
      	  references CONTACT (ID_CONTACT);

alter table LIAISON_ECOLE
      add constraint fk2_liaison_ecole foreign key (NUMERO_ECOLE)
      	  references ECOLE (NUMERO_ECOLE);

alter table DESCRIPTION_CONTACT
      add constraint fk1_description_contact foreign key (NUMERO_ENTREPRISE)
      	  references ENTREPRISE (NUMERO_ENTREPRISE);

alter table DESCRIPTION_CONTACT
      add constraint fk2_description_contact foreign key (ID_CONTACT)
      	  references CONTACT (ID_CONTACT);

alter table STAGE
      add constraint fk1_stage foreign key (ID_CONTACT)
      	  references CONTACT (ID_CONTACT);






