-- 1. Wyświetl daty wypożyczeń, a także imiona i nazwiska klientów, którzy w danym dniu dokonywali wypożyczenia.
-- 2. Wyświetl marki i modele aut wraz z cenami za dobę wypożyczenia.
-- 3. Wyświetl imiona i nazwiska pracowników wypożyczani, którzy obsługiwali wypożyczenia w lipcu 2022 roku.
-- 4. Wyświetl marki i modele aut, które w okresie od kwietnia do września wypożyczał klient o nazwisku Karwowski.
-- 5. Wyświetl wartość wypożyczeń, które obsługiwał pracownik o nazwisku Nowacki.
-----------------Zadanie-1-----------------

SELECT 
    w.data_wyp,
    k.imie_klienta,
    k.nazwisko_klienta
FROM
    wypozyczenia w
    LEFT JOIN klienci k USING (id_klienta)
ORDER BY
    w.data_wyp,
    k.imie_klienta,
    k.nazwisko_klienta;

-----------------Zadanie-2-----------------

SELECT DISTINCT
    s.marka,
    s.model,
    dw.cena_doba
FROM
    samochody s
    JOIN dane_wypozyczen dw USING (id_samochodu)
ORDER BY
    dw.cena_doba DESC

-----------------Zadanie-3-----------------

SELECT DISTINCT
    p.id_pracownika,
    p.imie_pracownika,
    p.nazwisko_pracownika
FROM
    pracownicy p
    JOIN wypozyczenia w USING (id_pracownika)
WHERE
    YEAR(w.data_wyp) = 2022 and MONTH(w.data_wyp) = 7

-----------------Zadanie-4-----------------

SELECT DISTINCT
    k.nazwisko_klienta,
    s.marka,
    s.model
FROM
    samochody s
    JOIN dane_wypozyczen dw USING (id_samochodu)
    JOIN wypozyczenia w USING (id_wypozyczenia)
    JOIN klienci k USING (id_klienta)
WHERE
    k.nazwisko_klienta = "Karwowski"
    AND MONTH(w.data_wyp) BETWEEN 4 AND 9

-----------------Zadanie-5-----------------

SELECT
    p.nazwisko_pracownika,
    dw.cena_doba*dw.ilosc_dob as wartość_wypożyczenia,
    w.data_wyp
FROM
    dane_wypozyczen dw
    JOIN wypozyczenia w USING (id_wypozyczenia)
    JOIN pracownicy p USING (id_pracownika)
WHERE
    p.nazwisko_pracownika = "Nowacki"
ORDER BY
    w.data_wyp