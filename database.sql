-- SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
-- SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Multiversum_DB
-- -----------------------------------------------------
-- CREATE SCHEMA IF NOT EXISTS `Multiversum_DB` DEFAULT CHARACTER SET utf8 ;
DROP DATABASE `Multiversum_DB`;
CREATE DATABASE IF NOT EXISTS `Multiversum_DB` DEFAULT CHARACTER SET utf8;
USE `Multiversum_DB`;

-- -----------------------------------------------------
-- Table `Multiversum_DB`.`VR_bril`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Multiversum_DB`.`VR_bril` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `naam` VARCHAR(75) NULL,
  `model` VARCHAR(45) NULL,
  `3d_2d` VARCHAR(45) NULL,
  `resolutie` VARCHAR(45) NULL,
  `platform` VARCHAR(45) NULL,
  `merk` VARCHAR(45) NULL,
  `afbeelding` VARCHAR(255) NULL,
  `prijs` DECIMAL(8,2) NULL,
  `beschrijving` TEXT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID`),
  UNIQUE INDEX `naam_UNIQUE` (`naam`),
  UNIQUE INDEX `afbeelding_UNIQUE` (`afbeelding`)
);
-- ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table inserts `Multiversum_DB`.`VR_bril`
-- -----------------------------------------------------
INSERT INTO `Multiversum_DB`.`VR_bril` (`naam`, `model`, `3d_2d`, `resolutie`, `platform`, `merk`, `afbeelding`, `prijs`, `beschrijving`)

VALUES
    ('Oculus Rift Bundle (Rift + Touch)', 'Oculus Rift', '3d', '2160x1200', 'Pc', 'Oculus', 'view/assets/images/products/1.jpeg', 499.00, NULL),
    ('HP Windows Mixed Reality headset', 'HP Windows Mixed Reality headset', '3d', '2880x1440', 'Pc', 'HP', 'view/assets/images/products/2.jpeg', 399.00, NULL),
    ('Dell Visor + Dell Visor Controllers', 'Dell visor', '3d', '2880x1440', 'Pc', 'Dell', 'view/assets/images/products/3.jpeg', 435.46, NULL),
    ('HTC Vive Business Edition', 'HTC Vive', '3d', '2160x1200', 'Pc', 'HTC', 'view/assets/images/products/4.jpeg', 1390.00, NULL),
    ('HTC Vive', 'HTC Vive', '3d', '2160x1200', 'Pc', 'HTC', 'view/assets/images/products/5.jpeg', 599.00, NULL),

    ('Samsung New Gear VR + Gear VR Controller', 'Samsung New Gear VR + Gear VR Controller', '3d', 'Geen eigen display', 'Smartphone', 'Samsung', 'view/assets/images/products/6.png', 121.59, NULL),
    ('Medion Erazer X1000 Mixed Reality Headset', 'Medion Erazer X1000 Mixed Reality Headset', '3d', '2880x1440', 'Pc', 'Medion', 'view/assets/images/products/7.jpeg', 449, NULL),
    ('Samsung Gear VR 4 + Gear VR Controller', 'Samsung Gear VR 4 + Gear VR Controller', '3d', 'Geen eigen display', 'Smartphone', 'Samsung', 'view/assets/images/products/8.jpeg', 114.95, NULL),
    ('Samsung Gear VR 2', 'Samsung Gear VR 2', '3d', 'Geen eigen display', 'Smartphone', 'Samsung', 'view/assets/images/products/9.jpeg', 79.90, NULL),
    ('OSVR Hacker Development Kit 2', 'OSVR Hacker Development Kit 2', '3d', '2160x1200', 'Pc', 'OSVR', 'view/assets/images/products/10.png', 436.68, NULL),

    ('Lenovo Explorer Headset', 'Lenovo Explorer Headset', '3d', '2880x1440', 'Pc', 'Lenovo', 'view/assets/images/products/11.jpeg', 456.55, NULL),
    ('Oculus Rift', 'Oculus Rift', '3d', '2160x1200', 'Pc', 'Oculus', 'view/assets/images/products/12.png', 549, NULL),
    ('Samsung Galaxy Gear VR (v2)', 'Samsung Galaxy Gear VR (v2)', '3d', 'Geen eigen display', 'Smartphone', 'Samsung', 'view/assets/images/products/13.jpeg', 59.90, NULL),
    ('Sony PlayStation VR + VR Worlds + PS Camera', 'Sony PlayStation VR', '3d', '1920x1080', 'PlayStation4', 'Sony', 'view/assets/images/products/14.png', 249, NULL),
    ('Sony PlayStation VR', 'Sony PlayStation VR', '3d', '1920x1080', 'PlayStation4', 'Sony', 'view/assets/images/products/15.png', 229, NULL),

    ('VR Shinecon VR Bril Zwart + Bluetooth Remote Control Wit', 'VR Shinecon VR Bril', '3d', 'Geen eigen display', 'Smartphone', 'VR Shinecon', 'view/assets/images/products/16.jpeg', 29.95, NULL),
    ('VR Shinecon VR Bril Zwart + Bluetooth Gamepad en Remote Control Wit', 'VR Shinecon VR Bril', '3d', 'Geen eigen display', 'Smartphone', 'VR Shinecon', 'view/assets/images/products/17.jpeg', 29.95, NULL),
    ('VR Shinecon VR Bril Zwart + Bluetooth Gamepad en Remote Control Zwart', 'VR Shinecon VR Bril', '3d', 'Geen eigen display', 'Smartphone', 'VR Shinecon', 'view/assets/images/products/18.jpeg', 28.05, NULL),
    ('VR Shinecon VR Bril Zwart + Bluetooth Remote Control Zwart', 'VR Shinecon VR Bril', '3d', 'Geen eigen display', 'Smartphone', 'VR Shinecon', 'view/assets/images/products/19.jpeg', 23.60, NULL),
    ('VR Shinecon VR Bril Zwart + Bluetooth Gamepad Zwart', 'VR Shinecon VR Bril', '3d', 'Geen eigen display', 'Smartphone', 'VR Shinecon', 'view/assets/images/products/20.jpeg', 34.95, NULL),

    ('VR Shinecon VR Bril Zwart', 'VR Shinecon VR Bril', '3d', 'Geen eigen display', 'Smartphone', 'VR Shinecon', 'view/assets/images/products/21.jpeg', 24.95, NULL),
    ('VR BOX VR-bril + Bluetooth Remote Control (Zwart)', 'VR BOX VR-bril', '3d', 'Geen eigen display', 'Smartphone', 'VR Box', 'view/assets/images/products/22.jpeg', 19.95, NULL),
    ('VR BOX VR-bril + Bluetooth Remote Control (Wit)', 'VR BOX VR-bril', '3d', 'Geen eigen display', 'Smartphone', 'VR Box', 'view/assets/images/products/23.jpeg', 16.80, NULL),
    ('VR BOX VR-bril', 'VR BOX VR-bril', '3d', 'Geen eigen display', 'Smartphone', 'VR Box', 'view/assets/images/products/24.jpeg', 20, NULL),
    ('Homido Smartphone Virtual Reality Headset', 'Homido Smartphone Virtual Reality Headset', '3d', 'Geen eigen display', 'Smartphone', 'Homido', 'view/assets/images/products/25.png', 35, NULL);


UPDATE VR_bril
SET beschrijving = "Geniet optimaal van Virtual Reality met deze bundel aanbieding van de Oculus Rift met de Oculus Touch controllers. Met deze combinatie heb je het beste in handen op het gebied van VR. De veel geprezen, goed ontworpen Oculus Rift headset, samen met de indrukwekkende Oculus Touch, waarmee je je in menig game met buttons, vinger en handbewegingen volop kan genieten van de virtuele wereld.
<br><br>
Om jouw Oculus VR ervaring helemaal compleet te maken beschikt de Oculus Rift over de mogelijkheid om de hele ruimte in 360 graden de tracken. Dit wordt room-scale genoemd. Voor het Roomscalen heb je naast een Oculus Rift Headset en een paar Touch controllers ook een extra Oculus Sensor nodig. Met deze extra sensor heb je in totaal 3 sensors. (Er wordt standaard een sensor meegeleverd met de headset en een sensor bij het paar Touch controllers. De extra sensor zorg ervoor dat je over 3 sensors beschikt en dat is voldoende voor Roomscale. Bekijk hier de instructies voor het opzetten van roomscale.
<br><br>
Tenslotte is het natuurlijk ook handig dat je je kabels (USB & HDMI) kunt verlengen, zodat je meer bewegingsvrijheid hebt."
WHERE id = 1;

UPDATE VR_bril
SET beschrijving = "Met de HP Windows Mixed Reality VR Headset duik je in VR zonder dat je losse sensoren nodig hebt. Deze Virtual Reality bril volgt zelf de bewegingen van de bril, zonder dat je statieven en sensoren nodig hebt. Het is dus een kwestie van aansluiten op een geschikte windows 10 pc en je gaat gelijk met deze bril aan de slag, waar je ook bent. Dankzij de 2 meegeleverde motion controllers interacter je direct met de virtuele objecten, zoals het gooien van een virtuele bal door de beweging na te bootsen of het bedienen van virtuele televisie. Wil je even helemaal terug naar de echte wereld? Dan klap je de bril omhoog om een gesprek te voeren en klap je hem terug naar beneden wanneer je verder gaat."
WHERE id = 2;

UPDATE VR_bril
SET beschrijving = "Dell-systemen vormen de basis van Virtual Reality, ze zorgen voor intense ervaringen met innovatieve machines die vol met de allerbeste specificaties zitten. Wij hebben een reeks standaarden ontwikkeld en met de marktleiders samengewerkt om u te voorzien van laptops, desktop-PC's, werkstations - en nu Dell Visor - voor VR. De Dell Visor is een VR-hoofdtelefoon die compatibel met het Mixed Reality-platform van Microsoft Windows is en direct kan worden gebruikt. Combineer hem met geselecteerde hard- en software en met Windows 10 RS 3 en zie hoe uw VR-games, video's en films tot leven komen."
WHERE id = 3;

UPDATE VR_bril
SET beschrijving = "Met de HTC Vive Business Edition maak je plannen, ontwerpen en concepten tastbaar via Virtual Reality. Of je nou een klant door zijn toekomstige huiskamer laat 'lopen', een architecturale bouwtekening tot leven laat komen of een patiënt via VR therapie behandelt; de Business edition bieden je het platform om dit waar te maken. Met deze editie van de HTC Vive maak je ook gebruik van de HTC Vive zakelijke garantie, waarbij HTC defecte modellen zo snel mogelijk omwisselt voor een vervangend model. Inbegrepen bij de zakelijke editie zijn de kabel extension kit met in totaal 10 meter aan kabels, de deluxe audio headstrap en 4 gezichtskussens. Hierdoor beschik je precies over wat je nodig hebt voor intensief professioneel gebruik van de Vive."
WHERE id = 4;

UPDATE VR_bril
SET beschrijving = "De HTC Vive is een virtual reality bril met bewegingscontrollers die je met je pc of laptop gebruikt. Met deze VR bril beleef je virtuele werelden in de hoogste kwaliteit. Met de bijgeleverde bewegingscontrollers en basisstations zie je jouw bewegingen in VR verschijnen. Zo pak je eenvoudig een object op en loop je er de virtuele ruimte mee door. Wees niet bang dat je tegen een muur aan loopt, het ingebouwde chaperone camerasysteem waarschuwt je wanneer je het einde van de speelruimte nadert. Verplaats jezelf naar de top van de Mount Everest, verdedig jezelf tegen een horde zombies of kijk een film op een gesimuleerd bioscoopscherm."
WHERE id = 5;

UPDATE VR_bril
SET beschrijving = "Met de Samsung Gear VR 4 SM-R325NZVAPHN brengen Samsung en Oculus de wereld van VR games en video's naar de Note 8. Klik je Samsung telefoon in de voorkant van de bril, waarna deze als scherm dient. Je bedient de bril met het trackpad aan de zijkant. Nieuw aan het trackpad is de fysieke 'home' knop, waardoor je makkelijk naar het menu schakelt. Ook de lens is verbeterd, hierdoor is hij beter af te stellen en zijn de graphics scherper. Jouw kijkrichting bepaalt wat je op dat moment ziet: kijk je omhoog dan zie je bijvoorbeeld de lucht, kijk je naar beneden dan zie je grond waar je op 'staat'. Dit laat je films en games vanuit elke hoek beleven."
WHERE id = 6;

UPDATE VR_bril
SET beschrijving = "VR gamen zonder losse sensoren doe je voortaan met de Medion Erazer X1000 Mixed Reality VR Bril. Deze Virtual Reality bril volgt zelf de bewegingen van de bril, zonder dat je statieven en sensoren nodig hebt. Het is dus een kwestie van aansluiten op een geschikte windows 10 gaming pc en je duikt de wereld van VR in. Dankzij de 2 meegeleverde motion controllers interacter je direct met de virtuele objecten, zoals het gooien van een virtuele bal door de beweging na te bootsen of het bedienen van virtuele televisie. Even pauze? Dan klap je de bril omhoog om een gesprek te voeren en klap je hem terug naar beneden wanneer je verder speelt."
WHERE id = 7;

UPDATE VR_bril
SET beschrijving = "Met de Samsung Gear VR 4 SM-R325NZVAPHN brengen Samsung en Oculus de wereld van VR games en video's naar de Note 8. Klik je Samsung telefoon in de voorkant van de bril, waarna deze als scherm dient. Je bedient de bril met het trackpad aan de zijkant. Nieuw aan het trackpad is de fysieke 'home' knop, waardoor je makkelijk naar het menu schakelt. Ook de lens is verbeterd, hierdoor is hij beter af te stellen en zijn de graphics scherper. Jouw kijkrichting bepaalt wat je op dat moment ziet: kijk je omhoog dan zie je bijvoorbeeld de lucht, kijk je naar beneden dan zie je grond waar je op 'staat'. Dit laat je films en games vanuit elke hoek beleven."
WHERE id = 8;

UPDATE VR_bril
SET beschrijving = "De Gear VR voor de Samsung Galaxy S6 en Galaxy S7 zorgt ervoor dat je een hele nieuwe wereld binnen gaat. Deze innovatieve virtual reality headset zorgt voor een 360-graden surround cinema-achtige kijkervaring. Je kan genieten van haarscherpe beelden dankzij de hogere resolutie en de grote hoeveel pixels waar de Samsung Galaxy S6 over beschikt."
WHERE id = 9;

UPDATE VR_bril
SET beschrijving = "OVSR staat voor Open Source Virtual Reality, een standaard voor VR-gaming waaraan diverse grote bedrijven zoals Razer meewerken. Met als enige doel om VR-gaming zo gemakkelijk mogelijk te maken, niet alleen voor producenten van VR-apparatuur en -games, maar vooral voor de gamers die zich graag aan VR-gaming wagen. De Razer OVSR Hacker Development Kit 2 is Razers bijdrage aan OVSR. Volgens de fabrikant is de bril vooral ontworpen om een goede VR-ervaring te leveren op mid-range pc's. Oftewel: in tegenstelling tot bijvoorbeeld de HTC Vive vereist de Razer Razer OVSR Hacker Development Kit geen über-computer om te kunnen functioneren."
WHERE id = 10;

UPDATE VR_bril
SET beschrijving = "Duik in de wereld van Virtual Reality met de Lenovo Explorer Mixed Reality! De Lenovo Mixed Reality bril is in staat om zelf bewegingen van de bril te volgen, zonder de bijkomstigheid van extra sensoren. Sluit de VR-headset aan op een compatible Windows 10 desktop of laptop en je kunt gelijk aan de slag. De bril wordt geleverd met twee motion controllers, waardoor je interactief kunt gamen. Denk aan het gooien van een virtuele bal door deze beweging na te doen of het bedienen van een auto.

Een gevoel van vrijheid
Met de Lenovo Explorer heb je de vrijheid om je te bewegen binnen en rond een ruimte van 3,5 m x 3,5 m. Huppel, spring of duik in de rondt en de VR bril volgt elke beweging met superieure nauwkeurigheid en vloeiende bewegingen.

Ga op ontdekkingsreis
Ga terug in de tijd naar 1465 en ontdek de verborgen geheimen van Machu Picchu. Kies in alle vroegte het luchtruim boven Rome in een ballon. Of geniet van 360-graden beeld rond het hele veld tijdens een live NBA-wedstrijd. Of bekijk gewoon je favoriete programma's in je eigen VR theater."
WHERE id = 11;

UPDATE VR_bril
SET beschrijving = "Ga in één keer aan de slag met de Oculus Rift zoals het bedoeld is: met 2 touch controllers. Dit pakket omvat namelijk de Oculus Rift VR Bril, 2 Oculus Rift Touch Controllers en 6 gratis meegeleverde games. Ook beschik je over 2 Oculus sensoren die zowel de bewegingen van de headset als de precieze bewegingen van de controller in 3D volgen. De headset dompelt je onder in de virtuele wereld en de controllers zorgen dat je op natuurlijk wijze de interactie opzoekt met de virtuele objecten en vijanden die je tegenkomt. Zo 'gooi' je granaten met dezelfde beweging als je dit in het echt zou doen. Op deze manier vergeet je dat je een controller in je handen hebt en ga je op in de game.

Let op, de Oculus Rift heeft een grafisch krachtige pc nodig. Lagere specificaties zijn mogelijk, maar kunnen problemen opleveren bij zwaardere games. Voor een optimale Oculus Rift ervaring raden wij de volgende minimum specificaties aan:"
WHERE id = 12;

UPDATE VR_bril
SET beschrijving = "De Gear VR voor de Samsung Galaxy S6 en Galaxy S7 zorgt ervoor dat je een hele nieuwe wereld binnen gaat. Deze innovatieve virtual reality headset zorgt voor een 360-graden surround cinema-achtige kijkervaring. Je kan genieten van haarscherpe beelden dankzij de hogere resolutie en de grote hoeveel pixels waar de Samsung Galaxy S6 over beschikt."
WHERE id = 13;

UPDATE VR_bril
SET beschrijving = "Met de Sony PlayStation VR Worlds Pakket is jouw PS4 in één keer klaar voor VR. De hoofdrolspeler in het pakket is de Sony PlayStation VR bril, welke jou straks meeneemt in de diepgaande wereld van PlayStation VR games. Ook ontvang je de PlayStation Camera V2; deze camera volgt de bewegingen van de headset en vertaalt jouw hoofdbewegingen naar de game, zodat je de camera beweegt door in het rond te kijken. Met de meegeleverde VR Worlds game maak je meteen gebruik van je PlayStation VR en dompel je jezelf onder in een virtuele wereld."
WHERE id = 14;

UPDATE VR_bril
SET beschrijving = "Ik had eerlijk gezegd zelf niet verwacht dat dit ding ZO goed zou werken. Sony staat al jaren garant voor kwaliteit en dat weet ik, maar ze hebben echt mijn verwachtingen te boven gegaan. De bril zelf is net licht genoeg om niet te storen en hij is zeer makkelijk aanpasbaar zodat iedereen hem kan gebruiken. Het installeren van de PS VR en de extra processor unit zorgt er wel voor dat je een warboel aan kabels bij hebt opeens, maar die kan je nog makkelijk achter de kast weg werken.
De bril in actie werkt zo goed als perfect. De eerste keer dat ik speelde deed het wat vreemd maar daarna kon ik uren spelen zonder duizeligheid of misselijkheid. Er zijn al een paar zeer leuke games uit voor dit toestel en hopelijk komen er nog een hele hoop!

Vond je dit een nuttige review?"
WHERE id = 15;

UPDATE VR_bril
SET beschrijving = "Altijd al mee willen spelen in een actie film of onderdeel te zijn van je favoriete videogame? Met de VR SHINECON Virtual Reality bril ben jij de hoofdpersoon in je eigen fantasiewereld. Maak van je eigen smartphone een besloten bioscoop en beleef elke keer opnieuw een virtueel avontuur. De VR SHINECON Virtual Reality bril is speciaal ontworpen voor smartphones van 4 tot en met 6 inch. Virtual Reality Bril met verstelbaar gezichtsmasker
De VR SHINECON Virtual Reality bril heeft een comfortabele hoofdband met zacht lederen zijkanten rondom het gezichtsmasker. Hierdoor kun je ongestoord en uren lang rond dwalen in een virtuele dimensie. De Virtual Reality bril is eenvoudig te verstellen naar de meest optimale afstand voor je ogen. Dankzij de HD optische lenzen kun je genieten van een intense 3D ervaring. Ultieme 3D kijkervaring
Begeef je elke keer weer in een uitzonderlijke omgeving, dankzij de VR SHINECON Virtual Reality bril. Met de VR SHINECON Virtual Reality bril word je niet beperkt door kabels en kun je genieten van je bewegingsvrijheid. Vrij bewegen, zitten en je hoofd roteren zorgen voor een ultieme 360 graden ervaring.
De VR SHINECON Virtual Reality Bril wordt geleverd met een Bluetooth Remote Control, voor het beheren van functies en voor een optimale game beleving.
"
WHERE id = 16;

UPDATE VR_bril
SET beschrijving = "Altijd al mee willen spelen in een actie film of onderdeel te zijn van je favoriete videogame? Met de VR SHINECON Virtual Reality bril ben jij de hoofdpersoon in je eigen fantasiewereld. Maak van je eigen smartphone een besloten bioscoop en beleef elke keer opnieuw een virtueel avontuur. De VR SHINECON Virtual Reality bril is speciaal ontworpen voor smartphones van 4 tot en met 6 inch. Virtual Reality Bril met verstelbaar gezichtsmasker
De VR SHINECON Virtual Reality bril heeft een comfortabele hoofdband met zacht lederen zijkanten rondom het gezichtsmasker. Hierdoor kun je ongestoord en uren lang rond dwalen in een virtuele dimensie. De Virtual Reality bril is eenvoudig te verstellen naar de meest optimale afstand voor je ogen. Dankzij de HD optische lenzen kun je genieten van een intense 3D ervaring. Ultieme 3D kijkervaring
Begeef je elke keer weer in een uitzonderlijke omgeving, dankzij de VR SHINECON Virtual Reality bril. Met de VR SHINECON Virtual Reality bril word je niet beperkt door kabels en kun je genieten van je bewegingsvrijheid. Vrij bewegen, zitten en je hoofd roteren zorgen voor een ultieme 360 graden ervaring.
De VR SHINECON Virtual Reality Bril wordt geleverd met een Bluetooth Gamepad en Remote Control, voor het beheren van functies en voor een optimale game beleving.

Bestel de VR SHINECON Virtual Reality bril en wees de held(in) in iedere film en videogame."
WHERE id = 17;

UPDATE VR_bril
SET beschrijving = "Altijd al mee willen spelen in een actie film of onderdeel te zijn van je favoriete videogame? Met de VR SHINECON Virtual Reality bril ben jij de hoofdpersoon in je eigen fantasiewereld. Maak van je eigen smartphone een besloten bioscoop en beleef elke keer opnieuw een virtueel avontuur. De VR SHINECON Virtual Reality bril is speciaal ontworpen voor smartphones van 4 tot en met 6 inch. Virtual Reality Bril met verstelbaar gezichtsmasker
De VR SHINECON Virtual Reality bril heeft een comfortabele hoofdband met zacht lederen zijkanten rondom het gezichtsmasker. Hierdoor kun je ongestoord en uren lang rond dwalen in een virtuele dimensie. De Virtual Reality bril is eenvoudig te verstellen naar de meest optimale afstand voor je ogen. Dankzij de HD optische lenzen kun je genieten van een intense 3D ervaring. Ultieme 3D kijkervaring
Begeef je elke keer weer in een uitzonderlijke omgeving, dankzij de VR SHINECON Virtual Reality bril. Met de VR SHINECON Virtual Reality bril word je niet beperkt door kabels en kun je genieten van je bewegingsvrijheid. Vrij bewegen, zitten en je hoofd roteren zorgen voor een ultieme 360 graden ervaring.
De VR SHINECON Virtual Reality Bril wordt geleverd met een Bluetooth Gamepad en Remote Control, voor het beheren van functies en voor een optimale game beleving."
WHERE id = 18;

UPDATE VR_bril
SET beschrijving = "Speel spelletjes op een nieuw niveau met deze VR bril! Dankzij de verstelbare, elastieken band zit de bril altijd prettig op uw hoofd en daarnaast zijn de lenzen geheel naar wens af te stellen. Tevens is een universele afstandsbediening inbegrepen!"
WHERE id = 19;

UPDATE VR_bril
SET beschrijving = "Virtual Reality biedt veel nieuwe en interessante mogelijkheden. VR Shinecon biedt met de VR bril een 360 graden ervaring die een nieuwe dimensie geeft aan smartphone gebruik. Met de bril kunt u HD videos bekijken, films beleven en helemaal opgaan in favoriete games. De comfortabele headset is voor iedere situatie en houding geschikt. Zo kan staand, liggend en zittend worden genoten van Virtual Reality in optima forma."
WHERE id = 20;

UPDATE VR_bril
SET beschrijving = "Altijd al mee willen spelen in een actie film of onderdeel te zijn van je favoriete videogame? Met de VR SHINECON Virtual Reality bril ben jij de hoofdpersoon in je eigen fantasiewereld. De VR SHINECON Virtual Reality bril heeft een comfortabele hoofdband met zacht lederen zijkanten rondom het gezichtsmasker. Daarnaast kun je de Virtual Reality bril eenvoudig verstellen naar de meest optimale afstand voor je ogen. De VR SHINECON Virtual Reality bril is speciaal ontworpen voor smartphones van 4 tot en met 6 inch en biedt elke keer weer een uitzonderlijke 3D ervaring.
"
WHERE id = 21;

UPDATE VR_bril
SET beschrijving = "Beleef jouw favoriete speelfilm of videogame nog intenser met de VR BOX Virtual Reality Bril. Met de VR BOX Virtual Reality bril krijg je het gevoel onderdeel te zijn van je eigen virtuele wereld. Je plaatst het toestel in de VR BOX smartphone houder en jou telefoon wordt omgetoverd tot een eigen 3D bioscoop. De VR BOX is speciaal ontworpen voor smartphones van 4.7 tot en met 6 inch."
WHERE id = 22;

UPDATE VR_bril
SET beschrijving = "Beleef jouw favoriete speelfilm of videogame nog intenser met de VR BOX Virtual Reality Bril. Met de VR BOX Virtual Reality bril krijg je het gevoel onderdeel te zijn van je eigen virtuele wereld. Je plaatst het toestel in de VR BOX smartphone houder en jou telefoon wordt omgetoverd tot een eigen 3D bioscoop. De VR BOX is speciaal ontworpen voor smartphones van 4.7 tot en met 6 inch."
WHERE id = 23;

UPDATE VR_bril
SET beschrijving = "Beleef jouw favoriete speelfilm of videogame nog intenser met de VR BOX Virtual Reality Bril."
WHERE id = 24;

UPDATE VR_bril
SET beschrijving = "Stap in de wereld van Virtual Reality met deze headset van Homido! Deze comfortabele headset heeft verstelbare lenzen en een elastische hoofdband, zodat u optimaal van VR games of video's kunt genieten. Geschikt voor 4,7 inch - 5,5 inch smartphones."
WHERE id = 25;


-- SET SQL_MODE=@OLD_SQL_MODE;
-- SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
-- SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
