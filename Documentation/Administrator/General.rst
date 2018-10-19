XTAB General Configuration
==========================

Auf dieser Seite werden generelle Einstellungen zur zu erstellenden Kreuztabelle getroffen. Diese werden im folgenden detailliert beschrieben. Folgende Parameter können eingestellt werden:

- Title for this XTAB
- Description 
- Details pageUid (contains a Datatable plugin) 
- Value (leave empty for count) 
- FROM 
- JOIN 
- Where conditions (ini-file style section names will replace ###SECTIONNAME### in clauses 
- WHERE clause 
- GROUP BY clause 
- ORDER BY clause 
- manual override 
- User Lock
- Links in XTAB 
- Map row or column headers (<header> = <value>) 

Einige dieser EInstellungen sind obsolet und werden voraussichtlich nicht mehr benötigt.

Title for this XTAB
-------------------

Titel der Kreuztabelle. Der Titel wird über der Kreuztabelle angezeigt.

Description 
-----------

Beschreibung der Kreuztabelle. Wird nach dem Titel angezeigt. Derzeit ein reines Textfeld, allerdings werden HTML-Tags korrekt ausgegeben.

Details pageUid (contains a Datatable plugin)
---------------------------------------------

Hier kann eine Seiten-ID eingegeben werden. Bei entsprechender Konfiguration kann über die generierten Links eine Listenansicht 
aufgerufen werden. Damit diese Darstellung einwandfrei aufgerufen werden kann, 
sind einige Voraussetzungen nötig, die die Kenntnis der Funktionsweise der Erweiterung **datatables** erforderlich machen.
Hierzu befinden sich weiter unten noch detaillierte Informationen.

Value (leave empty for count) 
-----------------------------

Die Kreuztabelle kann grundsätzlich zwei verschiedene Aufgaben erfüllen: EInerseits die Anzahl der betroffenen Datensätze 
ermitteln und ausgeben. In diesem Fall bleibt dieses Feld leer. Die resultierende Abfrage wird ein COUNT (*) zur Ermittlung 
der Anzahl der Datensätze gemäß Reihen- und Spaltendefinition enthalten.

An dieser Stelle kann aber ein Eintrag vorgenommen werden, der diesen ersetzt; zum Beispiel um Werte einer Tabellenspalte zu 
addieren, statt diese nur zu zählen. Damit korrekte Ergebnisse gefliefert werden können, ist es erforderlich, dass die Elemente 
der Spalte entsprechende Daten enthalten. Dies muss nicht zwingend ein numerischer Typ sein, allerdings kann es durch die automtische 
Typkonversion zu unvorhergesehenen Ergebnissen kommen.

Der häufigste Einsatz wird ein Eintrag der Form SUM(<field_name>) sein.  Eine weitere Anwendung betrifft das Entfernen von Doubletten, 
die bei entsprechender Datenlage auftreten können. In diesem Fall könnte ein COUNT (DISTINCT <field_name>) zweckmäßig sein. Dies hängt von 
der jeweiligen SItuation ab.

In letzterem Fall ist zu beachten, dass bei Verweis auf die Listenansicht über die 
datatables Erweiterung diese Doubletten in der Regel nicht automatisch unterdrücken kann.

FROM
----

Diese Klausel enthält die Haupttabelle, aus der die Abfragen generiert werden. 
Derzeit ist keine Auswahl aus den Modellen vorgesehen, da in diesem Fall nur jene Tabellen herangezogen werden könnten, 
für die ein TCA vorliegt. Da dies nicht immer der Fall ist, muss der korrekte Tabellenname eingetragen werden.

Die eingesetzten Tabellen können entweder über die Typo3-internen Datenbankfunktionen oder mit externen Tools (phpmyadmin) 
ermittelt werden oder direkt über die Konfigurationen der jeweiligen Erweiterungen ausgelesen werden.

JOIN 
----

In diesem Feld können allfällige JOINs eingetragen werden. In der bisherigen Version war dies mit FROM zusammengezogen. Es können beliebige JOINs erstellt werden, 
Das erste JOIN ist ein LEFT JOIN.

Where conditions (ini-file style section names will replace ###SECTIONNAME### in clauses 
----------------------------------------------------------------------------------------

Dieser Bereich erlaubt eine weitgehende Konfiguration zusätzlicher Bedingungen und Abfragekriterien. 
Die prinzipielle Funktionsweise ist derzeit wie folgt:

Der Textbereich wird über die php-Funktion parse_ini_string in ein Array umgewandelt. Dies hat zur Folge, 
dass bestimmte Zeichen in den Schlüssel/Wertepaaren nicht akzeptiert werden. Dies sind besipielsweise Klammern, 
Striche etc. Daher empfiehlt es sich, auf den Einsatz dieser SOnderzeichen zu verzichten.
Die generelle Struktur sieht so aus:

.. code-block:: php

    [ <reference> : <title> ]
    <key1> = <value1>
    <key2> = <value2>

Außerdem gibt es noch eine optionale Sektion mit dem Titel **mapcolumn:**

.. code-block:: php

    [ mapcolumn ]
    <column_value1> = <mapped_value1>
    <column_value2> = <mapped_value2>

Besonders in diesem Bereich sei noch einmal daran erinnert, dass es derzeit nicht möglich ist, 
Klammern oder ähnliches einzusetzen.

Wird ein Eintrag der ersten Form gefunden, so wird dieser als Dropdown-Auswahlfeld angezeigt. 
Die Bezeichnung des Auswahlfeldes ist <title> und der der Wert wird über den Tag ###REFERENCE### angesprochen. 

Dieser Wert wird so wie er ist in das SQL-Statement eingefügt. D.h. dass Textwerte zusätzlich von 
Hochkommas eingeschlossen werden müssen.

Diese Werte können nun in sämtlichen Teilen der Abfragen (WHERE, JOIN, Spalten- und Zeilendefinitionen) eingesetzt werden.

Da es unter bestimmten Umständen möglich ist, dass eine Ersetzung eine weitere Ersetzung enthält, 
wird diese Ersetzung kaskadiert ausgeführt.

Da der Einsatzbereich dieser Optionen sehr vielfältig ist, kann damit auch massiv in die tatsächliche 
Ausführung der Abfragen eingegriffen werden und unter Umständen nur über eine Listenauswahl zwei 
völlig verschiedene Verhaltensweisen innerhalb derselben Abfrage realisiert werden.
Dies hat zur Folge, dass im Gegensatz zur bisherigen xtab_generator Erweiterung zahlreiche 
unterschiedliche Parameter in nur eine einzige Abfrage gepackt werden können. Dadurch kann die Anzahl 
der benötigten Einzelseiten gegenüber der alten Erweiterung erheblich reduziert werden.
Dies wird dadurch noch verstärkt, dass in der alten Version nur ein einziger zusätzlicher 
Abfrageparameter angegeben werden konnte. Im Gegensatz dazu sind jetzt beliebig viele möglich. 

WHERE clause 
------------

Die *WHERE clause* wird so wie sie ist in das resultierende SQL-Statement eingesetzt. 
Wie im vorigen Abschnitt beschrieben, weden hierbei die Ersetzungsmarker in Großbuchstaben 
durch die Werte aus den Dropdown-Listenfeldern ersetzt (falls vorhanden).
Hierbei ist es wichtig zu wissen, dass vom xtab_generator keinerlei Typo3-internen 
Verwaltungsfelder autmatisch inkludiert - also ausgelesen werden.

Dadurch ist es möglich, auf sämtliche Datensätze zuzugreifen, allerdings müssen Felder, 
die das Ergebnis beeinflussen könnten, manuell hinzugefügt werden.
Daher wird es zumeist eine Einschränkung der Form *<table_name>.deleted = 0* geben müssen. 
Je nach Modell kann auch eine Einschränkung nach Start und Ende oder dem Feld hidden sinnvoll oder notwendig sein.

GROUP BY clause 
---------------

Derzeit nicht in Verwendung.

ORDER BY clause 
---------------

Derzeit nicht in Verwendung.

manual override 
---------------

Derzeit nicht in Verwendung, da die Erfordernisse hierfür nun (fast) zur Gänze mit den 
bereitgestellten Parametern abgedeckt werden können.

User Lock
---------

Derzeit nicht in Verwendung. Die Funktionsweise war eine zusätzliche Bedingung der 
Form fe_users.uid = ###FRONTENDUSERID### und hat dazu geführt, dass nur jene Datensätze 
ausgewertet werden, die in Zusammenhang mit dem angemeldeten Benutzer stehen.

Dies kann jetzt aber anders gelöst werden und ist daher voraussichtlich obsolet.

Links in XTAB 
-------------

Für diesen Parameter sind drei Werte möglich:

- No links
- Links in all but last row/column
- Links in all rows/columns

Hier wird gesteuert, ob und wo Links zur Detail-Listenansicht der selektierten Ergebnisse erzeugt werden sollen.
Hierzu ist es zwingend erforderlich, den Parameter Details pageUid zu setzen und auf der 
refernzierten Seite das Plugin der datatables Erweiterung korrekt konfiguriert zu installieren.

Der zweite Wert unterdrückt die Generierung von Links in den letzten Zeilen und Spalten. 
Dies kann sinnvoll oder sogar notwendig sein, wenn es sich um Summenspalten handelt, die nicht 
gemeinsam in einer Detailtabelle angezeigt werden können.

Map row or column headers (<header> = <value>)
----------------------------------------------

Dieser Parameter wird nicht mehr benötigt. Er wird durch die Struktur wie unter *Where Conditions* beschrieben ersetzt. 
Das erzeugte SQL-Statement wird dann die erzeugten Zeilen- und Spaltenköpfe durch die entsprechenden 
Werte ersetzen. Hierzu wird die SQL-Funktion ELT() eingesetzt. Dadurch kann es in speziellen Einzelfällen zu 
unerwünschten Verhalten oder einem SQL-Fehler kommen.

Im wesentlichen dient die Funktion dazu, unterschiedliche Zeilen- oder Spaltenköpfe gemäß 
eigener Vorstellungen zu „gruppieren“ oder zusammenzuziehen. Es ist zu beachten, dass in diesem Fall ein 
Verweis auf ein datatables Plugin in der Regel nur eingeschränkt möglich sein wird.

