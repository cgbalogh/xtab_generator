.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _admin-manual:

Für Administratoren
===================

Zielgruppe: **Administratoren**

Installation
------------

Die Installation erfolgt in gewohnter Weise durch den Extension Manager. 
Damit die Erweiterung eingebunden werden kann, muss das statische Template **XTAB Generator** eingebunden werden. 

#. Extension Manager aufrufen
#. Installieren Sie die Extension
#. Laden Sie das statische Template

Die Konfiguration der jeweiligen ABfrage wird über das Plugin eingerichtet. 
Zusätzliche EInstellungen im TypoScript sind nicht erforderlich.

Plugin 
------

Um eine Kreuztabelle auf einer Seite zu platzieren, fügen Sie im gewünschten Bereich das Plugin **XTAB Generator** ein.
Bitte beachten SIe, dass es üblicherweise keine gute Idee ist, mehrere Plugins auf einer Seite zu platzieren, da sich dies erheblich
auf die Performance auswirken kann.

Konfiguration
-------------

Die Konfiguration erfolgt auf folgenden Registerkarten:

.. toctree::
  :maxdepth: 1

  Function
  General
  Column
  Row
  Zaxis
  Excel

