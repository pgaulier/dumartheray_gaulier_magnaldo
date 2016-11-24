
-- Classement des mots clés par nombre de stages:

select T.DESCRIPTION, count(DS.NUMERO_STAGE) as NOMBRE_STAGES,
from TAG T left outer join DESCRIPTION_STAGE DS on T.NUMERO_TAG=DS.NUMERO_TAG
group by T.NUMERO_TAG, T.DESCRIPTION
order by NOMBRE_STAGES desc; 



-- Durée moyenne des stages par filière:

select E.DEPARTEMENT, avg(S.DUREE),
from (ELEVE E inner join DESCRIPTION_STAGIAIRE DS on DS.ID_ELEVE=E.ID_PERSONNE) inner join STAGE S on DS.NUMERO_STAGE=S.NUMERO_STAGE,
group by E.DEPARTEMENT;



-- Classement donnateurs de l école:

select EN.NOM, sum(T.TAXE) as TAXES_PAYEES,
from ENTREPRISE EN inner join TAXE T on EN.NUMERO_ENTREPRISE=T.NUMERO_TAXE,
group by T.NUMERO_ENTREPRISE
order by TAXES_PAYEES;
