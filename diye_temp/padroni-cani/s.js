document.querySelector("main ul").addEventListener("click", (e) => {
  const id = e.target.dataset.id;
  const form = document.querySelector("form");

  switch (true) {
    case e.target.classList.contains("btnElimina"):
      if (confirm("Sicuro di voler eliminare questo padrone?")) {
        form.querySelector('input[name="azione"]').value = "elimina";
        form.querySelector('input[name="id"]').value = id;
        form.querySelector('input[name="nome"]').value = "";
        form.querySelector('input[name="telefono"]').value = "";
        form.submit();
      }
      break;

    case e.target.classList.contains("btnModifica"):
      form.querySelector('input[name="azione"]').value = "modifica";
      form.querySelector('input[name="id"]').value = id;
      form.submit();
      break;
  }
});
