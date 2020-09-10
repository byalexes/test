----------------------------------------------------------------------------------------------------------------------------
SELECT
    id, fullname,
    ((SELECT IFNULL(SUM(amount),0) FROM transactions WHERE to_person_id = persons.id ) - (SELECT IFNULL(SUM(amount),0)
    FROM transactions
    WHERE from_person_id=persons.id))+100
    AS Summ FROM persons;
----------------------------------------------------------------------------------------------------------------------------
SELECT
	COUNT(transactions.from_person_id) as TransNumber,
	(SELECT persons.city_id FROM persons WHERE persons.id = from_person_id) as CityId,
	(SELECT cities.name FROM cities WHERE cities.id = CityId) as CityName
FROM transactions
GROUP BY CityName
ORDER BY TransNumber
DESC LIMIT 1;
----------------------------------------------------------------------------------------------------------------------------
SELECT
    transactions.from_person_id as FromTrans,
    transactions.to_person_id as ToTrans,
	(SELECT persons.city_id FROM persons WHERE persons.id = from_person_id) as CityId1,
    (SELECT persons.city_id FROM persons WHERE persons.id = to_person_id) as CityId2,
	(SELECT cities.name FROM cities WHERE cities.id = CityId1 AND cities.id = CityId2) as CityName
FROM transactions
GROUP BY CityName
DESC LIMIT 1;