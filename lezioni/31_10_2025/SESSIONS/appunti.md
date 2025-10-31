vanno all'inizio pagina perché devono lavorare con header e i cookie
Lavora in RAM, è più veloce di un database
Posso portarmi dietro in session piccoli dati veloci per far funzionare un app
login, salvare ricerca fatta dall'utente
veloce ed effimera, in teoria non sono da riusare

quando l'utente si sconnette chiudere le sessioni

consente navigazione efficiente più personalizzata...
ma allo stesso tempo non bisogna usarle troppo o abusarne

ES
app di due file, il primo contiene un modulo, qual'è il tuo animale preferito,
chiama se stesso, se c'è $_REQUET animale preferito lo salva in sessione,
 la seconda pagina saluta e dice il tuo animale preferito