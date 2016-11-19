-- ============================================================                        
--    suppression des donnees                                                          
-- ============================================================                        

delete from ENTREPRISE ;
delete from DESCRIPTION_ENTREPRISE ;
delete from GENRE;
delete from TAXE ;
delete from STAGE ;
delete from DESCRIPTION_STAGE ;
delete from TAG;
delete from DESCRIPTION_STAGIARE ;
delete from PERSONNE ;
delete from ECOLE;
delete from DESCRIPTION_CONTACT;
delete from EVENEMENT;
commit ;

-- =================================================
--creation des données
--==================================================


--  ENTREPRISE


insert into ENTREPRISE values (  1 , 'THALES'     , 'RUE TOUSSAINT CATROS'       , 33000, 'BORDEAUX', '33556135000', 'www.thales.com', 1001 ) 
insert into ENTREPRISE values (  2 , 'SELAHT'     , 'RUE SORTAC TNIASSUOT'       , 33001, 'XUAEDROB', '33556136969', 'www.selaht.io', 1 )
insert into ENTREPRISE values (  3 , 'GULLI'     , 'AVENUE DU FUN'       , 33000, 'DISNEYLAND', '666', 'www.tuveuxdufun.com', 42 )
insert into ENTREPRISE values (  4 , 'BERNARD & CO'     , 'BOULEVARD DU TRAVAIL INTENSE'       , 42421, 'PAS A BORDEAUX', '3333333', 'www.randonnee.com', 11 )
insert into ENTREPRISE values (  5 , 'FLEUR DE PLAISIR'     , 'MARCHE LA QUIZOUR'       , 33000, 'BORDEAUX', '335411120', 'www.FLEUR-PLAISIR.com', 9999 )



-- DESCRIPTION_ENTREPRISE

insert into DESCRIPTION_ENTREPRISE values ( 1, 1 )
insert into DESCRIPTION_ENTREPRISE values ( 2, 2 )
insert into DESCRIPTION_ENTREPRISE values ( 3, 3 )
insert into DESCRIPTION_ENTREPRISE values ( 4, 2 )
insert into DESCRIPTION_ENTREPRISE values ( 5, 1 )


-- GENRE

insert into GENRE values (1, 'DEFENSE'  )
insert into GENRE values (2, 'INTENSITE'  )
insert into GENRE values (3, 'DETERMINATION'  )


-- TAXE


insert into TAXE values  ( 1, 1, 100, '01-JAN-15'  )
insert into TAXE values  ( 2,1, 250, '01-FEB-15' )
insert into TAXE values  ( 3,1, 999, '01-JAN-06')
insert into TAXE values  ( 4,2,69 ,'01-JAN-02')
insert into TAXE values  ( 5,3, 42, '01-JAN-12')
insert into TAXE values  ( 6,4, 1, '01-JAN-14')
insert into TAXE values  ( 7,5, 999, '01-JAN-23')
insert into TAXE values  ( 8 ,5, 666,'01-JAN-65')


--  STAGE
insert into STAGE values (1, 1, 1, 'CREATION SONORE','01-JAN-23','01-JAN-24')
insert into STAGE values (2,1,1, 'ARCHITECTE RESEAUX','01-JAN-23','01-JAN-24')
insert into STAGE values (3,1,1, 'VIRTUALISTATION','01-JAN-23','01-JAN-24')
insert into STAGE values (4,1,1, 'ANALYSE AUTOMATIQUE','01-JAN-23','01-JAN-24')
insert into STAGE values (5,2,2, 'DETECTEUR DE SPAM','01-JAN-23','01-JAN-24')
insert into STAGE values (6,3,3, 'FUNAMISATOR','01-JAN-23','01-JAN-24')
insert into STAGE values (7,4,4, 'RECHERCHE DE L INTENSITE','01-JAN-23','01-JAN-24')
insert into STAGE values (8,4,5, 'RANDONNE DANS LES ALPES','01-JAN-23','01-JAN-24')
insert into STAGE values (9,5,6, 'ALGORITHME DE TAROT MENTAL','01-JAN-23','01-JAN-24')
insert into STAGE values (10,5,7, 'CREATION D ARMES THERMONUCLEAIRE','01-JAN-23','01-JAN-24')




-- DESCRIPTION_STAGE

insert into DESCRIPTION_STAGE values(1,1)
insert into DESCRIPTION_STAGE values(2,2)
insert into DESCRIPTION_STAGE values(3,3)
insert into DESCRIPTION_STAGE values(2,4)
insert into DESCRIPTION_STAGE values(1,5)
insert into DESCRIPTION_STAGE values(2,6)
insert into DESCRIPTION_STAGE values(4,7)
insert into DESCRIPTION_STAGE values(3,8)
insert into DESCRIPTION_STAGE values(2,9)
insert into DESCRIPTION_STAGE values(2,10)

-- TAG

insert into TAG values(1,'java')
insert into TAG values(2,'c++')
insert into TAG values(3,'fortran')
insert into TAG values(4,'assembleur')


-- DESCRITPTION_STAGIAURE


insert into DESCRIPTION_STAGIAIRE values(1,8)
insert into DESCRIPTION_STAGIAIRE values(2,8)
insert into DESCRIPTION_STAGIAIRE values(3,8)
insert into DESCRIPTION_STAGIAIRE values(4,9)
insert into DESCRIPTION_STAGIAIRE values(5,10)
insert into DESCRIPTION_STAGIAIRE values(6,11)
insert into DESCRIPTION_STAGIAIRE values(7,12)
insert into DESCRIPTION_STAGIAIRE values(8,13)
insert into DESCRIPTION_STAGIAIRE values(9,14)
insert into DESCRIPTION_STAGIAIRE values(10,14)



-- PERSONNE

-- SUPERVISEUR

insert into PERSONNE values(2,2,1, 'MOULE', 'A GAUFFRE',null,null,null,null,null,null,'MANGEUR DE BANNANE')
insert into PERSONNE values(3,3,1, 'BACHI','BOUZOUK' ,null,null,null,null,null,null,'MANGEUR DE MANGEUR DE BANNANE')
insert into PERSONNE values(4,4,1, 'ZOUAVE', 'INTERPLANETAIRE',null,null,null,null,null,null,'ALPINISTE CONVAINCU')
insert into PERSONNE values(5,4,1, 'ECTOPLASME', 'AROULETTE',null,null,null,null,null,null,'TESTEUR D INTENSITE')
insert into PERSONNE values(6,5,1, 'BULLDOZER', 'AREACTION',null,null,null,null,null,null,'DIETETICIEN')
insert into PERSONNE values(7,5,1, 'TCHOUCK', 'TCHOUCK-NOUGAT',null,null,null,null,null,null,'CHOCOPAIN')



-- ELEVE

insert into PERSONNE values(8,null,1,'NUNCHUK', 'JACKY',null,null,null,2, 'INFO', 'I2',null)
insert into PERSONNE values(9,null,1, 'PORTIGUE', 'HARRY',null,null,null,1, 'MATMECA', 'M1',null)
insert into PERSONNE values(10,null,1, 'JACK', 'MONSIEUR',null,null,null,3, 'INFO', 'I3',null)
insert into PERSONNE values(11,null,1, 'LACASTAGNE', 'PROFESSEUR',null,null,null,1,'ELEC', 'E1',null)
insert into PERSONNE values(12,null,1, 'LEADER', 'LE',null,null,null,2, 'INFO', 'I2',null)
insert into PERSONNE values(13,null,1, 'RIPLEY', 'JEAN-GUY',null,null,null,2, 'MATMECA', 'M2',null)
insert into PERSONNE values(14,null,1, 'BILLY', 'BILLY',null,null,null,2,'ELEC', 'E2',null)




-- ANCIEN ELEVE 


insert into PERSONNE values(1,1,1, 'TURFU', 'JEAN',null,null,null,null,null,null,'COORDINATEUR DES POMMES')



-- ECOLE

insert into ECOLE values(1,'ENSEIRB-MATMECA', '0556846500', 'AVENUE DU DR ALBERT SCHWEITZER')



-- DESCRIPTION_CONTACT

--insert into DESCRIPTION_CONTACT values(
--insert into DESCRIPTION_CONTACT values(
--insert into DESCRIPTION_CONTACT values(
--insert into DESCRIPTION_CONTACT values(
--insert into DESCRIPTION_CONTACT values(
--insert into DESCRIPTION_CONTACT values(

