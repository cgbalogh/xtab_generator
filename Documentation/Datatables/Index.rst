.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _datatables:

Datatables
=============

Integration der datatables Erweiterung
--------------------------------------

Generelle Funktionsweise
""""""""""""""""""""""""

Bei der Generierung von Links in der Kreuztabelle wird ein Verweis auf eine Seite 
mit dem datatables Plugin erzeugt. Damit dies funktioniert, wird zunächst das Plugin 
auf der Zielseite so konfiguriert, dass es prinzipiell die gewünschte Liste anzeigt. 
Dazu muss das korrekte Domänenmodell und die gewünschten Spalten ausgewählt werden. 
Wie dies funktioniert, ist der Dokiumentation zu datatables zu entnehmen.

In weiterer Folge muss dem Plugin aber mitgeteilt werden, welche Unterauswahlen zu treffen 
sind. Hierbei wird nun jene SQL-Bedingung, die zum Ergebnis an einer bestimmten Zellenposition 
geführt hat, in diesen Link integriert. Dmait datatables das erkenn muss dort der Global filter 
gesetzt werden.

Der erforderliche Eintrag lautet PARAM und muss mit einem Leerzeichen abgeschlossen werden, 
falls weitere Einträge folgen.

Das in xtab_generator erzeugte SQL-Statement wird dann an datatbles übergeben.

Da auf diese Weise nicht alle Bedingungen übergeben werden können und insbesondere Verweise 
auf temporäre implizite SELECTS nicht funktionieren, können und müssen diese derzeit 
umständlich mit Additional JOIN ergänzt werden.

Allerdings ist diese Methode fehleranfällig und schwer zu debuggen.

Einstellungen in xtab_generator
-------------------------------

Details pageUid

Einstellungen in datatables
---------------------------

Global filter