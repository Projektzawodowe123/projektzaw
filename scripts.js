
/*
Jeśli chce pan zrobić kolorowanie na czerwono zajętych stolików musi pan 
to zrobić podczas ładowania stolików z bazy danych i odczytywania czy zajęty czy nie i dawania mu odpowiedniego kolorwania
Na lekcji omówimy jak to zrobić 
-A.Marciniak
*/

// Funkcja rezerwująca stół
function rezerwujStolik(stol) {
    // Zmiana koloru tekstu na czerwony (zajęty) w tabeli

    //nie używamy var tylko let, var zajmuje więcej miejsca i jest trudniej zarządalny dla js - A.Marciniak
    let stan = document.getElementById(("stol" + stol));
    stan.classList.remove("wolny");
    stan.classList.add("zajety");
    stan.innerText = "Zajęty";

    // Usunięcie opcji wyboru dla tego stolika
    let radio = document.getElementById("stol" + stol);
    radio.disabled = true;
}

// Funkcja do resetowania formularza, jeśli chcesz to dodać (możesz pominąć)
document.getElementById('form').onsubmit = function () {
    alert("Twoja rezerwacja została przyjęta!");
}
