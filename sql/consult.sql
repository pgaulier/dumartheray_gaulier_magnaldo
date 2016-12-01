
-- Classement des mots clés par nombre de stages:

select T.DESCRIPTION, count(DS.NUMERO_STAGE) as NOMBRE_STAGES
from TAG T left outer join DESCRIPTION_STAGE DS on T.NUMERO_TAG=DS.NUMERO_TAG
group by T.NUMERO_TAG, T.DESCRIPTION
order by NOMBRE_STAGES desc; 



-- Durée moyenne des stages par filière:

select E.DEPARTEMENT, avg(S.DATE_FIN-S.DATE_DEBUT) as DUREE_MOYENNE
from (ELEVE E inner join DESCRIPTION_STAGIAIRE DS on DS.ID_ELEVE=E.ID_ELEVE) inner join STAGE S on DS.NUMERO_STAGE=S.NUMERO_STAGE
group by E.DEPARTEMENT;



-- Classement donnateurs de l école:

select EN.NOM_ENTREPRISE, sum(T.MONTANT) as TAXES_PAYEES
from ENTREPRISE EN inner join TAXE T on EN.NUMERO_ENTREPRISE=T.NUMERO_TAXE
group by EN.NOM_ENTREPRISE 
order by TAXES_PAYEES desc;





select P.NOM          
   from PERSONNE P inner join ELEVE E on P.ID_PERSONNE=E.ID_ELEVE;



select S.SUJET, T.DESCRIPTION
from (TAG T inner join DESCRIPTION_STAGE DS on DS.NUMERO_TAG = T.NUMERO_TAG) inner join STAGE S on DS.NUMERO_STAGE = S.NUMERO_STAGE;


select DATEDIFF(STAGE.DEBUT, STAGE.FIN) from STAGE;
