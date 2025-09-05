function prepara() {
  const hidden = document.getElementById("js");
  hidden.value = JSON.stringify(studenti);
  return true;
}

let studenti = [];

function aggiungi() {
  const nome = document.querySelector('input[name="studente[0][nome]"]').value;
  const mat = document.querySelector('input[name="studente[0][mat]"]').value;
  const gra = document.querySelector('input[name="studente[0][gra]"]').value;
  const geo = document.querySelector('input[name="studente[0][geo]"]').value;
  const sto = document.querySelector('input[name="studente[0][sto]"]').value;
  const bio = document.querySelector('input[name="studente[0][bio]"]').value;
  const psi = document.querySelector('input[name="studente[0][psi]"]').value;

  if (!nome) {
    alert("Devi inserire nome e media dei voti!");
    return;
  }

  studenti.push({
    nome,
    mat,
    gra,
    geo,
    sto,
    bio,
    psi,
  });

  document.querySelector('input[name="studente[0][nome]"]').value = "";
  document.querySelector('input[name="studente[0][mat]"]').value = "";
  document.querySelector('input[name="studente[0][gra]"]').value = "";
  document.querySelector('input[name="studente[0][geo]"]').value = "";
  document.querySelector('input[name="studente[0][sto]"]').value = "";
  document.querySelector('input[name="studente[0][bio]"]').value = "";
  document.querySelector('input[name="studente[0][psi]"]').value = "";

  aggiornaFooter();
}

function aggiornaFooter() {
  const footer = document.getElementById("f");
  if (!footer) return;

  let classe = "<h3>Studenti inseriti</h3>";
  classe += "<ul>";
  studenti.forEach((studente, i) => {
    classe += `<li><strong>${studente.nome}</strong><br>
    Matematica: ${studente.mat}<br>
    Grammatica: ${studente.gra}<br>
    Geografia: ${studente.geo}<br>
    Storia: ${studente.sto}<br>
    Biologia: ${studente.bio}<br>
    Psicologia: ${studente.psi}</li>`;
  });
  classe += "</ul>";

  footer.innerHTML = classe;
}
