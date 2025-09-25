let indiceStudente = 1;
// contatore per gli indici dei nuovi studenti aggiunti

function aggiungiStudente() {
    // funzione che viene chiamata ogni volta che voglio creare un nuovo blocco di campi input per studente
  const contenitore = document.getElementById("contenitoreStudenti");
  // recupero il div che conterrà tutti i blocchi input degli studenti
  const nuovoStudente = document.querySelector(".studente").cloneNode(true);
  /* prendo il primo elemento con classe studente dalla pagina
  (querySelector restituisce il primo match)
  e clono l'intero nodo HTML, compresi attributi e figli (input, label) */
  const inputs = nuovoStudente.querySelectorAll("input");
  // seleziono tutti gli input all'interno del blocco duplicato
  inputs.forEach((input) => {
    // per ciascun input del blocco clonato
    const nomeVecchio = input.name;
    // salvo il nome originale input.name che presumibilmente contiene un numero, es: nome1
    const nomeNuovo = nomeVecchio.match(/\d+/) ? nomeVecchio.replace(/\d+/, indiceStudente) : nomeVecchio + indiceStudente;
    /* con una regex che cerca uno o più numeri sostituisco il numero nel nome con il numero dell'indice
    anche se non c'è un numero nel name */
    input.name = nomeNuovo;
    // aggiorno l'attributo name col nuovo valore
    input.value = "";
    /* pulisco il valore inserito dall'utente nell'input text
    così è pronto ad ospitare il nuovo nome dello studente da inserire */
  });
  contenitore.appendChild(nuovoStudente);
  // aggiungo il nuovo blocco di input per studente nel div
  indiceStudente++;
  // incremento l'indice dello studente nuovo aggiunto mantenendo invariati i name delle varie materie
}
