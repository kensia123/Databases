--Alicia Cook
--Dudleen Paul
--Kensia Saint-Hilaire

SELECT address 
FROM Listings
WHERE address IN (SELECT address FROM House); 

SELECT address, mlsNumber 
FROM Listings
WHERE address IN (SELECT address FROM House); 

SELECT address 
FROM Listings 
WHERE address IN (SELECT address FROM House
					WHERE bedrooms = 3 OR bedrooms = 2);
					
SELECT Property.address, price
FROM Listings, Property 
WHERE Listings.address = Property.address AND 
	Property.address IN (SELECT address FROM House
					WHERE (bedrooms = 3 OR bedrooms = 2)) AND 
	Property.price >= 100000 AND Property.price <= 250000
ORDER BY price DESC;

SELECT BP.address, price 
FROM BusinessProperty as BP, Property as P
WHERE BP.address = P.address AND type = "office"
ORDER BY price DESC; 

SELECT agentId, Agent.name as AgentName, phone, Firm.name as FirmName, dateStarted
FROM Agent, Firm
WHERE firmId = id; 

SELECT P.address, ownerName, price 
FROM Property as P, Listings as L
WHERE P.address = L.address AND L.agentId = 001; 

SELECT Agent.name as AgentName, Buyer.name as BuyerName
FROM Agent, Buyer, Works_With
WHERE Works_With.buyerId = Buyer.id AND Works_With.agentID = Agent.agentId
ORDER BY AgentName; 

SELECT agentID, COUNT(buyerId)
FROM Works_With
GROUP BY agentID; 

SELECT House.address, size, House.bathrooms, House.bedrooms, price
FROM Property, House, Buyer
WHERE House.address = Property.address AND Buyer.id = 001 AND Buyer.bathrooms = House.bathrooms AND Buyer.bedrooms = House.bedrooms AND price < Buyer.maximumPreferredPrice AND price > Buyer.minimumPreferredPrice 
ORDER BY price DESC; 
