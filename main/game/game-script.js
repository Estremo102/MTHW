window.addEventListener('DOMContentLoaded', (event) => {
    
    var milionerzy = "Wszystkie podstawowe zasady gry teleturnieju są wzorowane na podstawie reguł brytyjskiego programu Who Wants to Be a Millionaire? Do etapu właściwego teleturnieju zawodnik kwalifikuje się poprzez rundę eliminacyjną Kto pierwszy, ten lepszy, w której na początku brało udział dziesięć osób, zaś od 2017 jest to sześć osób. W tej rundzie każdy uczestnik musi poprawnie ułożyć cztery odpowiedzi A, B, C i D we właściwej kolejności. Do gry dostaje się osoba, która zrobiła to najszybciej (czas podawany jest do części tysięcznych, dawniej setnych). Jeśli więcej niż jeden zawodnik ułoży w odpowiedniej kolejności odpowiedzi w tym samym czasie, odbywa się dogrywka. Po tym zwycięzca eliminacji rozpoczyna grę o milion złotych, w której musi poprawnie odpowiedzieć na dwanaście zamkniętych pytań (w latach 1999 - 2003 należało odpowiedzieć na 15 pytań).Domyślnie w czasie gry zawodnik ma do dyspozycji trzy koła ratunkowe. Od marca do grudnia 2010 zawodnik może też wybrać drugą ścieżkę gry, wtedy dostępne jest czwarte koło ratunkowe, ale kwota 40 000 zł nie była już sumą gwarantowaną.50:50 (pół na pół);Pytanie do publiczności;Telefon do przyjaciela"

    var fullfocus = "Gra składa się z pojedynków 1 na 1. W trakcie rozgrywki każdy gracz wykazać może się znajomością z zakresu gry League of Legends. Gra wymaga 1 osoby prowadzącej która to będzie posiadać pytania dla zawodników, oraz dwóch zawodników którzy staną naprzeciwko siebie. W momencie rozpoczęcia partii, prowadzący czyta pytanie. Od momentu zakońćzenia czytania gracze mają 45 sekund aby zgłosić się i udzielić poprawnej odpowiedzi. Jeśli takową udzieli i będzie ona poprawna. Gracz otrzymuje odpowiadającą pytaniu liczbę punktów. Jeśli natomiast udzieli odpowiedzi niepoprawnej, z jego konta zostaje odjęta połowa równowartości pytania. Co ważne, gracz nie może zejść poniżej 0. Jeśli upłynie 45 seknd i żaden z graczy się nie zgłosi, wtedy obydwoje tracą równowartość pytania. Wygrywa gracz który po upływie 10 rund uzyska najwięcej punktów. Do dyspozycji każdy gracz posiada również 3 grzybki. Czerwony: Podwaja wartość pytania, Niebieski: Zmienia pytanie, Zielony: Zamklepuje pytanjie dla danego gracza jescze za nim ruszy timer."

    var ms = "Strama to pała"

    function rulmodal() {
        document.getElementById("rul-bg-modal").style.display="flex"
         
          document.getElementById("body").style.overflow="hidden"
          document.getElementById('rul-txt').innerHTML=txt;
    }
    
    document.getElementById('milionerzy').addEventListener("click", function() {
        txt = milionerzy
        link = "../../gry/gra1/index.html"
        document.getElementById("link").href=link;
    });

    document.getElementById('ms').addEventListener("click", function() {
        txt = ms
        link = "https://www.youtube.com/watch?v=T_CU8U2l5gw&ab_channel=HouseOfFames"
        document.getElementById("link").href=link;
    });

    document.getElementById('fullfocus').addEventListener("click", function() {
        txt = fullfocus
        link = "../../gry/fullfocus.rar"
        document.getElementById("link").href=link;
    });

    var elem = document.getElementsByClassName('modal-button');
    for(let i=0;i<elem.length;i++){
    elem[i].addEventListener('click', function(txt) {
        document.getElementById("bg-modal").style.display="flex"
        
        document.getElementById("body").style.overflow="hidden"
        
    });
};
    var closebtn = document.querySelectorAll('.close')
    for(let i=0; i<closebtn.length;i++){
    closebtn[i].addEventListener('click', function() {
        document.getElementById("bg-modal").style.display="none"
        document.getElementById("body").style.overflow="auto"
        document.getElementById("rul-bg-modal").style.display="none"
        txt = null
        link = null
        
    });
}
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            document.getElementById("bg-modal").style.display="none"
            document.getElementById("body").style.overflow="auto"
            document.getElementById("rul-bg-modal").style.display="none"
            txt = null
            link = null
            
        }
      })

      var rulelem = document.getElementsByClassName('rul-modal-button');
      for(let i=0;i<rulelem.length;i++){
      rulelem[i].addEventListener('click', rulmodal);
    };
    });
    
  