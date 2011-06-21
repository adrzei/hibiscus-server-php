<?php

/**********************************************************************
 * $Source: /cvsroot/hibiscus/hibiscus.php/src/hibiscus/auftrag.php,v $
 * $Revision: 1.1 $
 * $Date: 2011/06/21 17:42:51 $
 *
 * Copyright (c) by willuhn - software & services
 * All rights reserved
 *
 **********************************************************************/

namespace hibiscus;

/**
 * Bean fuer einen Einzel-Auftrag.
 */
class auftrag
{
  /**
   * @var ID des Kontos in der Datenbank.
   */
  public $id               = null;
  
  /**
   * @var ID des zugeordneten Kontos.
   */
  public $konto            = null;

  /**
   * @var Bankleitzahl des Gegenkontos
   */
  public $blz              = null;
  
  /**
   * @var Kontonummer des Gegenkontos
   */
  public $kontonummer      = null;
  
  /**
   * @var Inhaber-Name des Gegenkontos
   */
  public $name             = null;
  
  /**
   * @var Betrag des Auftrages im Format "0,00"
   */
  public $betrag           = null;

  /**
   * @var Verwendungszweck (Array)
   * Verwenden Sie bitte die Funktion "addZweck($line)", um weitere
   * Zeilen Verwendungszweck hinzuzufuegen.
   */
  public $verwendungszweck = array();
  
  /**
   * @var Text-Schl�ssel (Auftragsart)
   * 
   * M�gliche Werte:
   *   - 04    Lastschrift - Abbuchungsverfahren
   *   - 05    Lastschrift - Einzugserm�chtigung
   *   - 51    �berweisung (muss nicht explizit angegeben werden)
   *   - 53    �berweisung - Lohn/Gehalt/Rente
   *   - 54    �berweisung - Verm�genswirksame Leistungen
   *   - 59    �berweisung R�ck�berweisung
   */
  public $textschluessel 	 = null;

  /**
   * @var Auftragsstatus (true/false)
   */
  public $ausgefuehrt      = null;
  
  /**
   * Fuegt eine Zeile Verwendungszweck hinzu.
   * @param line die zusaetzliche Zeile Verwendungszweck.
   */
  public function addVerwendungszweck($line)
  {
    array_push($this->verwendungszweck,$line);
  }

}

?>