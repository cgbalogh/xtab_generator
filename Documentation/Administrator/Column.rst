Column Settings
===============

Folgende Einstellungen können getroffen werden:

- Column header (native SQL statement) 
- Default Column header (shown when header empty) 
- Last Column header (shown in last column, useful if last row is a subsum) 
- Column group expression 
- Reverse Order 
- Rotate Headers by default 
- No Total Column 

Column header (native SQL statement) 
------------------------------------

Hier wird der Spaltenkopf selektiert. Basierend auf den EInstellungen der vorigen 
Seite muss das Ergebnis ein gültiger SQL-Ausdruck sein. Dies wird in der Ergebnisspalte colheader abgelegt.

Die Ersetzung von Markern findet wie oben beschrieben statt.

Default Column header (shown when header empty)
-----------------------------------------------

Dieser Wert ersetzt einen allfälligen leeren Eintrag im Spaltenkopf.

Last Column header (shown in last column, useful if last row is a subsum) 
-------------------------------------------------------------------------

Dieser Eintrag ersetzt den letzten Spaltenkopf.

Column group expression
-----------------------

Dieser Eintrag soll eine Untergruppierung ermöglichen. Allerdings wird er im Moment nicht benutzt und hat daher keine Auswirkung.

Reverse Order
-------------

Kehrt die Sortierung der Spaltenköpfe um.

Rotate Headers by default
-------------------------

Standardmäßig werden die Spaltenköpfe um 90° rotiert, um bei der Ausgabe Platz zu sparen. 
Beachten Sie, dass in manchen Browsern und insbesondere beim Drucken der Seiten 
Layoutprobleme beim Drehen der Spaltenköpfe auftreten können.

No Total Column
---------------

Unterdrückt die Ausgabe einer Summenspalte.