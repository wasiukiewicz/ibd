<?php

namespace Ibd;

class Ksiazki
{
	/**
	 * Instancja klasy obsługującej połączenie do bazy.
	 *
	 * @var Db
	 */
	private $db;

	public function __construct()
    {
        $this->db = new Db();
	}

	/**
	 * Pobiera wszystkie książki.
	 *
	 * @return array
	 */
	public function pobierzWszystkie()
	{
		$sql = "SELECT k.* FROM ksiazki k  ";

		return $this->db->pobierzWszystko($sql);
	}

	/**
	 * Pobiera dane książki o podanym id.
	 * 
	 * @param int $id
	 * @return array
	 */
	public function pobierz($id)
	{
		return $this->db->pobierz('ksiazki', $id);
	}

	/**
	 * Pobiera najlepiej sprzedające się książki.
	 * 
	 */
	public function pobierzBestsellery()
	{
		$sql = "SELECT book.id, book.tytul, book.zdjecie, author.imie, author.nazwisko FROM ksiazki book
				JOIN autorzy author ON author.id = book.id_autora
				ORDER BY RAND() LIMIT 5";

		return $this->db->pobierzWszystko($sql);
	}

	/**
	 * Pobiera wszystkie książki, z imieniem i nazwiskiem autora oraz kategorią.
	 *
	 * @return array
	 */
	public function pobierzWszystieZKategoriaIAutorem(){
		$sql = " SELECT book.*, author.imie, author.nazwisko, category.nazwa
				 FROM ksiazki book 
				 JOIN autorzy author ON author.id = book.id_autora
				 JOIN kategorie category ON category.id = book.id_kategorii
		 ";

		return $this->db->pobierzWszystko($sql);
	}


}
