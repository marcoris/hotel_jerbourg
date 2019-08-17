# Hotel Jerbourg

## TEKO

### Fallstudie moderne Webarchitekturen im Einsatz

Verwendung von MVC mit EF

### Zielsetzung an die Fallstudie
1.	Lösen einer Fallstudie mittlerer Komplexität unter Verwendung des roten Fadens UML
2.	Erstellen einer Webapplikation  
3.	Erkennen der Effizienz eines architekturbasierten Ansatzes (in unserem Falle MVC)
4.	Repetition Entity Framework

### Aufgabenstellung
-	Analyse nach UML resp. relationaler Technik zur Ableitung der Klassendiagramme resp. ERM
- Erstellen einer Webapplikation nach dem Schema MVC 5
- Einsatz von EF zur Erreichung einer effizienten Vorgehensweise
- Ableiten von Testplänen und Testen

### Beschreibung der Fallstudie
Wir haben den Auftrag erhalten für das Hotel Jerbourg in der Bretagne ein einfaches Reservationssystem zu entwickeln.

Das Hotel hat 29 Zimmer und wird von Gästen meistens zwischen 2-10 Tagen gebucht. Die Zimmer unseres Hotels teilen wir in 3 Kategorien (Standard, Premium, Suite) auf.

Der nachfolgende Workflow beschreibt das Geschäftsmodell, welches im Hotel angewandt wird:

- Die Gäste melden sich telefonisch oder via Mail bei uns an und reservieren ein Hotelzimmer der entsprechenden Kategorie
- Die Reservation wird
  - entweder in eine Buchung umgewandelt, wenn die Bezahlung geregelt ist
  - nach spätesten 5 Tagen aufgelöst, wenn keine Bezahlung eingetroffen ist
- Bei der Anreise der Gäste wird die Buchung aktiv, beim Check-out wird diese wiederum inaktiv (aber weiter gespeichert)

Der Hotelmanager möchte die nachfolgenden Auswertungen abrufen können:

-	Umsatz pro Kategorie pro Monat
-	Hitliste der Gäste (wer hat uns wie oft besucht?)
