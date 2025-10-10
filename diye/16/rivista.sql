create database rivista;
use rivista;
show tables;

create table autori(
id int auto_increment primary key,
nome varchar(20) not null
);

create table argomenti(
id int auto_increment primary key,
genere varchar(20) not null unique
);

create table articoli(
id int auto_increment primary key,
titolo varchar(30),
contenuto text not null,
lunghezza int not null,
id_autore int not null,
id_argomento int not null,
foreign key (id_autore) references autori(id),
foreign key (id_argomento) references argomenti(id)
);

CREATE TABLE pagine (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(10) NOT NULL UNIQUE,
  title VARCHAR(20) NOT NULL,
  h1 VARCHAR(30) NOT NULL,
  menu TEXT DEFAULT NULL,
  body TEXT NOT NULL,
  footer VARCHAR(20) NOT NULL
);


/* INSERT */
insert into argomenti (genere) values
('cronaca'),
('reportage'),
('intervista');

insert into pagine (nome, title, h1, menu, body, footer) values (
'homepage',
'Rivistas',
'Benvenuto su Rivistas',
'[]',
 '<p>Questa rivista è una fonte autorevole di cultura e attualità, riconosciuta per i suoi premi e per l\'attenzione alla qualità dei contenuti. Grazie ai suoi lettori appassionati, continua a crescere e a innovare, portando storie che ispirano e coinvolgono.</p><p>Dai premi internazionali ricevuti alle collaborazioni con esperti del settore, ogni numero rappresenta un\'esperienza unica per gli amanti della lettura.</p>',
 '© 2025 Rivistas'
 ),
 (
 'articoli',
 'Articoli',
 'I nosti articoli',
 '[]',
  '<p>Scopri la nostra selezione di articoli approfonditi, analisi e interviste esclusive sulle tematiche più attuali. Ogni articolo è curato con passione dai nostri esperti e dai contributi dei lettori.</p>',
  '© 2025 Rivistas'
 );
 
INSERT INTO articoli (titolo, contenuto, lunghezza, id_autore, id_argomento)
VALUES (
    'Flotilla a 120 miglia da Gaza',
    'La Global Sumud Flotilla è arrivata a circa 120 miglia nautiche dalla costa di Gaza. La navigazione prosegue alla velocità di 5 miglia all''ora. Al momento – fanno sapere gli attivisti – non hanno ricevuto segnali di alt da Israele. “Siamo in allerta permanente“, fa sapere il deputato del Pd, Arturo Scotto, che sta partecipando alla missione, aggiungendo che bordo delle imbarcazioni sono “consapevoli” che nel corso della giornata potrebbero essere avvicinata per un eventuale abbordaggio.

La Flotilla intorno alle 3 di questa notte è entrata nella zona ad alto rischio e in quei minuti ed è aumentata l''attività dei droni intorno alle barche. Alcuni natanti sono stati avvicinati da altre imbarcazioni con luci spente ma non identificate che si sono poi allontanate. “I partecipanti” alla spedizione “hanno applicato i protocolli di sicurezza in preparazione di un''intercettazione”, spiegano i partecipanti alla missione. Alcuni testimoni, tra cui l''ex sindaca di Barcellona Ada Colau, hanno parlato di un sommergibile che ha fatto manovre in cerchio per alcuni minuti.

Poco prima la fregata Alpino della Marina militare italiana ha diramato il secondo e ultimo avviso ufficiale. La nave ha comunicato che non avrebbe oltrepassato il limite delle 150 miglia marina. Fin dal primo avviso, diramato alle 16:30 di martedì, la Alpino si era detta disponibile a “recuperare eventuale personale che avesse voluto essere trasferito a bordo”. 

“Abbiamo visto l''esercito israeliano che sta arrivando e ci stiamo mettendo in posizione”, ha reso noto in un breve video postato sui suoi profili social l''eurodeputata europea di Avs Benedetta Scuderi. “Non sappiamo quando potremmo riaprire le comunicazioni”, ha aggiunto Scuderi che appare con indosso un giubbotto di salvataggio. Samuel Rostol, altro attivista norvegese a bordo di una delle navi della flottiglia, ha raccontato ad Al Jazeera che quasi tutto l''equipaggio della sua nave ha trascorso la maggior parte della notte sveglio a causa di diversi motivi di disturbo che, a suo avviso, erano “ovviamente una tattica per cercare di logorarci”. Ma, ha aggiunto “le stiamo prendendo tutte con il sorriso”.

Nel corso della notte a Roma, alcuni studenti del liceo occupato Cavour e aderenti a Osa, hanno inscenato un blitz sul ponte Annibaldi a poca distanza dal Colosseo. Sono stati esplosi fuochi d''artificio, esposte bandiere palestinesi e uno striscione con la scritta ''Giù le mani dalla Flotillà al grido “blocchiamo tutto”.',
    2470,
    1,
    1
);

insert into articoli (titolo, contenuto, lunghezza, id_autore, id_argomento)
values (
'I giovani laureati lasciano il Paese',
'luca monticelli roma Il presidente dell\'Istat
Francesco Maria Chelli fotografa l\'impatto
dell\'inverno demografico sul sistema
economico: «L\'invecchiamento e il rischio di
mancato ricambio generazionale riguarda il
30% delle imprese, si tratta in larga parte di
micro-attività».
In molti casi, sottolinea, il pensionamento del
titolare determina una chiusura dell\'attività:
«Esce dal mercato non solo un lavoratore ma
anche un datore».
Le imprese più piccole sono spesso anche
quelle caratterizzate da bassa scolarità e
meno orientate all\'innovazione, come succede
nel commercio, nella manifattura con poca
tecnologia e nei servizi alla persona.
Qui «l\'età media degli occupati è più alta
rispetto alla media generale, che è attorno ai
45 anni».
I giovani dove risultano più occupati?
«Nelle attività nuove e più dinamiche: nel
2022 gli occupati sotto i 35 anni
raggiungevano il 36% nelle imprese con meno
di 5 anni, a loro volta più frequentemente
gestite da imprenditori giovani, e fino a quasi
il 40% nelle attività dei servizi ad alta
tecnologia.',
1030,
4,
3);

INSERT INTO articoli (titolo, contenuto, lunghezza, id_autore, id_argomento)
VALUES (
    'Piogge record in Brasile',
    'Lo stato del Rio Grande do Sul, nel sud del Brasile, è stato colpito da piogge torrenziali che hanno causato inondazioni storiche. Intere città sono state sommerse, e il bilancio provvisorio delle vittime ha superato i 100 morti, con decine di persone ancora disperse. La forza dell\'acqua ha distrutto ponti e strade, isolando intere comunità e rendendo estremamente difficili le operazioni di soccorso. Migliaia di residenti sono stati costretti ad abbandonare le loro case, trovando rifugio in centri di accoglienza allestiti in scuole e palestre. Il presidente ha visitato la zona dichiarando lo stato di calamità, impegnando risorse federali per l\'assistenza immediata e la ricostruzione. Gli esperti meteorologi sottolineano che l\'intensità e la frequenza di questi eventi estremi sono in aumento, un chiaro segnale dei cambiamenti climatici in atto nella regione. La priorità ora è fornire acqua potabile e assistenza sanitaria, mentre le forze armate collaborano ai soccorsi.',
    980,
    8,
    1
);

INSERT INTO articoli (titolo, contenuto, lunghezza, id_autore, id_argomento)
VALUES (
    'Libia: bilancio tragico a Derna',
    'La città di Derna, in Libia, è stata devastata da inondazioni catastrofiche in seguito al passaggio della tempesta Daniel. Il bilancio delle vittime è salito a oltre 4.000, con migliaia di dispersi. L\'acqua ha spazzato via interi quartieri dopo il crollo di due dighe. Le operazioni di soccorso sono estremamente complicate a causa dei danni alle infrastrutture e delle divisioni politiche interne al Paese. L\'ONU ha lanciato un appello per aiuti umanitari urgenti, sottolineando la necessità di acqua potabile, cibo e alloggi temporanei. Molti corpi sono stati trascinati in mare, rendendo difficile l\'identificazione. La comunità internazionale sta inviando squadre di ricerca e soccorso, ma il caos e l\'entità della distruzione rallentano ogni sforzo. La situazione igienico-sanitaria è critica, con il rischio di diffusione di malattie. Il governo di unità nazionale ha dichiarato tre giorni di lutto nazionale, mentre le polemiche sulla manutenzione delle dighe aumentano.',
    985,
    5,
    1
);

INSERT INTO articoli (titolo, contenuto, lunghezza, id_autore, id_argomento)
VALUES (
    'Ai e lavoro: Intervista al Prof. Marino',
    'Abbiamo incontrato il Prof. Aldo Marino, luminare di Etica della Tecnologia presso l\'Università di Milano, per discutere del rapido avanzamento dell\'Intelligenza Artificiale.
    **Domanda:** Professore, l\'AI è un rischio o un\'opportunità per l\'occupazione?
    **Risposta:** "È entrambe le cose, e dipende da come ci prepariamo. L\'AI non sostituirà le persone, ma le persone che usano l\'AI sostituiranno quelle che non lo fanno. Verranno eliminati molti compiti ripetitivi, ma nasceranno nuove professioni che richiederanno creatività, pensiero critico e gestione etica degli algoritmi."
    **Domanda:** Qual è il settore più a rischio di trasformazione radicale?
    **Risposta:** "L\'ambito dei servizi e dell\'analisi dati è già in piena trasformazione. Tuttavia, è l\'educazione che deve cambiare più velocemente. Dobbiamo insegnare a \'lavorare con\' la macchina, non ad averne paura."
    **Domanda:** Come possiamo garantire che l\'AI sia equa?
    **Risposta:** "Il vero rischio è che l\'AI amplifichi i pregiudizi umani. I sistemi riflettono i dati con cui sono addestrati. È cruciale che i team di sviluppo siano diversi e che ci siano leggi chiare sulla trasparenza algoritmica. L\'etica non è un optional, è un requisito di sistema."',
    1150,
    10,
    3
);

INSERT INTO articoli (titolo, contenuto, lunghezza, id_autore, id_argomento)
VALUES (
    'Reportage dalla Terra Bruciata',
    'La polvere sollevata dal vento taglia l\'aria come schegge di vetro. Siamo nella piana del Metaponto, un tempo cuore pulsante dell\'agricoltura del Sud Italia, ora emblema della crisi climatica. I campi di grano sono stoppie secche e aride, le vigne lottano per assorbire l\'ultima goccia d\'acqua da un terreno indurito. Il contadino Antonio, 65 anni, osserva sconsolato i suoi ulivi: "Ho visto annate difficili, ma mai così. Quest\'anno ho perso quasi il 70% del raccolto di pesche. L\'acqua non arriva e i pozzi si stanno prosciugando." La sua è la storia di migliaia di agricoltori costretti a razionare la poca acqua rimasta, ricorrendo a sistemi di irrigazione d\'emergenza costosi e spesso inefficaci. La siccità non è solo un problema ambientale, ma un dramma economico e sociale. Molti giovani hanno abbandonato le campagne, vedendo il futuro della loro tradizione agricola svanire sotto il sole implacabile. Le istituzioni promettono fondi, ma per Antonio e i suoi vicini l\'aiuto sembra arrivare troppo tardi, mentre la "terra bruciata" si espande ogni giorno di più.',
    1250,
    6,
    2
);

INSERT INTO articoli (titolo, contenuto, lunghezza, id_autore, id_argomento)
VALUES (
    'Reportage: Il Mar Rosso che Muore',
    'Le telecamere subacquee rivelano uno scenario allarmante. Siamo al largo di Sharm el Sheikh, un tempo paradiso dei sub, oggi teatro silenzioso di una catastrofe ambientale. La temperatura media superficiale del Mar Rosso ha superato i record storici, innescando un "bleaching" (sbiancamento) massiccio dei coralli. Gli scienziati locali, intervistati a bordo della nave di ricerca "Nautilus", confermano che intere sezioni di barriera corallina, vitali per l\'ecosistema, sono ormai fantasmi calcarei. La Dott.ssa Leila Hassan, biologa marina, spiega: "I coralli hanno una sorprendente capacità di resilienza in alcune zone più profonde, ma la velocità del riscaldamento sta superando la loro capacità di adattamento." Il reportage evidenzia l\'impatto sulle comunità di pescatori, che vedono le loro prede diminuire drasticamente. La crisi del corallo è un campanello d\'allarme globale, un monito visibile su come l\'aumento di pochi decimi di grado possa cancellare interi ecosistemi. L\'unica speranza, secondo gli esperti, è un intervento rapido e globale per limitare le emissioni e l\'inquinamento locale.',
    1200,
    9,
    2
);

INSERT INTO articoli (titolo, contenuto, lunghezza, id_autore, id_argomento)
VALUES (
    'Accordo storico UE-Mercosur sul libero scambio',
    'Dopo anni di negoziati complessi e ritardi, l\'Unione Europea e il blocco commerciale sudamericano Mercosur (che include Brasile, Argentina, Uruguay e Paraguay) hanno raggiunto un accordo preliminare per un vasto trattato di libero scambio. L\'annuncio, dato a Bruxelles, mira a creare una delle più grandi aree di libero scambio al mondo. I punti chiave dell\'accordo includono la riduzione dei dazi doganali sui prodotti agricoli sudamericani e l\'accesso facilitato per le automobili e i prodotti farmaceutici europei nei mercati del Mercosur. Tuttavia, l\'accordo non è privo di polemiche. Forti resistenze sono state espresse dagli agricoltori europei, che temono la concorrenza sleale, e dalle organizzazioni ambientaliste, preoccupate per l\'impatto sulla deforestazione nell\'Amazzonia. Il trattato deve ancora essere ratificato dai parlamenti nazionali e dal Parlamento Europeo, un processo che si preannuncia lungo e acceso, ma che i sostenitori definiscono cruciale per rafforzare i legami geopolitici ed economici tra i due continenti.',
    1100,
    9,
    1
);

INSERT INTO articoli (titolo, contenuto, lunghezza, id_autore, id_argomento)
VALUES (
    'Vita oltre la Terra: Intervista a Lena Müller',
    'Abbiamo avuto il piacere di intervistare la Dott.ssa Lena Müller, una delle figure di spicco nel campo dell\'astrobiologia, reduce da una missione di ricerca estrema in Antartide.
    **Domanda:** Dottoressa, l\'interesse per la ricerca di vita extraterrestre è altissimo. Qual è la sua prospettiva attuale?
    **Risposta:** "Non è più una questione di *se* troveremo vita altrove, ma di *quando* e *dove* esattamente. La nostra ricerca in ambienti estremi sulla Terra, come i laghi subglaciali in Antartide o le sorgenti idrotermali, dimostra che la vita è incredibilmente resiliente e si adatta a condizioni che un tempo ritenevamo impossibili. Questo amplia enormemente le nostre aspettative per i mondi oceanici come Europa ed Encelado."
    **Domanda:** Quali sono i prossimi obiettivi della sua ricerca?
    **Risposta:** "Attualmente, ci concentriamo sulla comprensione dei biosignature non basati sul carbonio. Il nostro immaginario è limitato, ma la chimica cosmica ci suggerisce che la vita potrebbe avere forme radicalmente diverse. Il nostro lavoro in laboratorio mira a identificare indicatori universali di vita, indipendentemente dalla sua biochimica. È un lavoro affascinante e fondamentale, specialmente in vista delle future sonde su Titano e Venere. Il nostro scopo è passare dalla pura speculazione a una solida base scientifica per l\'esplorazione."
    **Domanda:** Un\'ultima riflessione sul futuro?
    **Risposta:** "Sono estremamente ottimista. Le prossime due decadi potrebbero riscrivere i libri di testo di biologia e astrofisica. Dobbiamo solo continuare a guardare in alto e scavare a fondo."',
    1350,
    1,
    3
);

INSERT INTO articoli (titolo, contenuto, lunghezza, id_autore, id_argomento)
VALUES (
    'La Teoria degli Universi Annidati',
    'I buchi neri non sono solo le voragini gravitazionali più estreme dell\'universo, ma, secondo alcune delle teorie più audaci dell\'astrofisica e della cosmologia, potrebbero essere la chiave per comprendere la struttura del multiverso. Il reportage esplora l\'ipotesi che ogni singolarità di un buco nero non porti alla fine, ma sia in realtà un ponte, o una "nascita", verso un nuovo universo separato. Questa teoria, nota come **Cosmologia del Buco Nero (Black Hole Cosmology)**, suggerisce che ogni nuovo universo si formi dal collasso di materia in un buco nero di un universo "genitore". La singolarità al centro, anziché essere un punto di densità infinita, agirebbe come un proprio "Big Bang", espandendo lo spazio-tempo in una dimensione nascosta al nostro cosmo. La massa e l\'energia del buco nero verrebbero riciclate nel nuovo universo. I critici sottolineano che, pur essendo matematicamente elegante, questa teoria manca di qualsiasi verifica osservabile. Tuttavia, essa offre soluzioni intriganti al problema delle leggi fisiche apparentemente "perfette" del nostro universo: ogni nuovo universo nascente svilupperebbe leggi fisiche leggermente diverse, spiegando perché il nostro è così ben sintonizzato per la vita. Le ricerche attuali, in particolare quelle che studiano l\'orizzonte degli eventi e l\'entropia dei buchi neri, potrebbero fornire indizi indiretti. Sebbene l\'ipotesi rimanga nel regno della speculazione teorica avanzata, essa ridefinisce il buco nero da terminale cosmico a **incubatrice** di realtà, trasformando ogni massiccia stella morente in una potenziale fonte di infiniti nuovi cosmi. L\'universo che osserviamo potrebbe essere, a sua volta, solo un granello di polvere nell\'immensa struttura di un universo genitore. La scienza sta solo grattando la superficie di queste estreme frontiere.',
    1820,
    1,
    2
);

insert into articoli (titolo, contenuto, lunghezza, id_autore, id_argomento)
values(
'Perché Trump punta sul corridoio di Zangezur',
'L’8 agosto Trump ha arruolato i leader di Armenia e Azerbaigian come suoi sostenitori per il tanto agognato Nobel per la pace. Quello nel Caucaso del Sud è il sesto conflitto che il presidente americano si fregia di aver risolto grazie a un accordo “per l\'istituzione della pace e delle relazioni interstatali tra le repubbliche dell\'Azerbaigian e dell’Armenia”. La ratifica dell’intesa, a dire la verità, non è stata ancora effettuata, ma Baku ed Erevan si sono impegnate a “proseguire con ulteriori azioni per giungere alla firma” e mai come adesso sono state vicine alla pace.',
579,
11,
1);

insert into articoli (titolo, contenuto, lunghezza, id_autore, id_argomento)
values(
'Senza uno Stato forte, il Libano non disarmerà Hezbollah',
'Dopo la sconfitta militare e politica di Hezbollah, il Libano sembra trovarsi a un crocevia storico. Sotto pressione da parte di Stati Uniti, Francia e Israele, il governo libanese – incarnato dal premier Nawaf Salam e dal suo esecutivo, ma soprattutto dal capo di Stato Joseph Aoun – è alle strette da mesi per tentare l’impossibile: disarmare Hezbollah, ancora sostenuto dall’Iran, indebolito ma non certo annientato dall’ultimo confronto diretto con Tel Aviv. 

Per disarmare Hezbollah gli Stati Uniti hanno finora proposto un approccio assai poco realistico e realizzabile, basato sull’equazione “o il disarmo o una nuova guerra” israeliana. Lo Stato ebraico occupa porzioni di territorio libanese e conduce giornalieri raid aerei nel paese dei cedri. Dal canto suo Hezbollah, forte di una comunità sciita dilaniata dalle ferite fisiche e morali dell’ultima guerra del 2024, ribadisce che non intende discutere del disarmo fino a quando Israele non si sia ritirato dal Sud del Libano e rispetti l’accordo di cessate-il-fuoco del novembre 2024. 

Di fronte all’impasse, gli Stati Uniti hanno posto al Libano un ultimatum temporale: il disarmo avvenga entro la fine dell’anno, chiedendo di fatto a Beirut di cambiare le regole del gioco dopo almeno tre decenni di radicamento della resistenza armata di Hezbollah nel Sud e nella valle orientale della Bekaa. 

Formalmente nei giorni scorsi il governo libanese ha “accolto favorevolmente” il piano dell’esercito libanese per il disarmo del Partito di Dio, altrimenti detto “imposizione del monopolio delle armi da parte dello Stato”. Il piano prevede cinque fasi di attuazione diverse, a cominciare dalla prima fase nel Sud del Libano (dal fiume Litani alla linea di demarcazione con Israele). Ma non sono previste scadenze temporali. L’esercito libanese – in parte foraggiato con strumentazioni ed equipaggiamento dagli americani – non è in grado sia in termini quantitativi sia qualitativi di agire per “disarmare Hezbollah”. Ma non è affatto una questione tecnica. È una questione prima di tutto politica.


Nel suo ultimo discorso del 10 settembre scorso il leader del gruppo armato libanese Naim Qassem ha messo il dito nella piaga: “la priorità del governo deve essere quella di ristabilire la sovranità (sul suo territorio) e cacciare Israele”. In quanto megafono della parte politica coinvolta direttamente nella questione, Qassem ha messo in evidenza un elemento indiscutibile della questione (l’occupazione militare israeliana, la debolezza dello Stato libanese), senza però aprire del tutto il sipario sul palcoscenico. Perché Hezbollah – e il suo alleato iraniano – da decenni sfrutta la debolezza di Beirut per promuovere i suoi interessi politici, non necessariamente in linea con quelli del resto dei libanesi. 

È qui il cuore del problema: la debolezza dello Stato non è contingente e passeggera, figlia di un contesto transitorio, né riguarda solo la questione di Hezbollah o soltanto quella del monopolio della violenza. Riguarda invece tutti i libanesi – anche quelli ostili al Partito di Dio – e segna da più di un secolo la storia quotidiana del Libano. La debolezza dello Stato è parte intrinseca di un paese creato a tavolino in piena era coloniale con lo scopo esplicito di frammentare i territori del Mediterraneo orientale su base comunitaria per poterli dominare, assicurarsi le loro risorse e, soprattutto, la loro posizione strategica nello spazio euro-asiatico. 

L’impasse attuale sul “disarmo di Hezbollah” va compresa alla luce di una sequenza cominciata a metà Ottocento – in tarda epoca ottomana – che ha generato, e continua a generare, dinamiche che finiscono per mantenere debole l’autorità dello Stato, contribuendo così a far emergere attori statuali più o meno legati a potenze straniere. La storia moderna e contemporanea del Libano offre numerosi esempi di questa sequenza, prima, durante e dopo la guerra civile (1975-1990). Prima, durante e dopo l’occupazione militare israeliana (1978-2000). Prima, durante e dopo l’occupazione militare siriana (1976-2005). 

Hezbollah e le sue armi, in tal senso, sono solo l’effetto più evidente di un fenomeno “carsico”, presente da molti decenni non solo in Libano ma in tutta la regione. Fenomeno che ha la sua origine nella creazione di Stati concepiti come contenitori di “popoli” il più possibile omogenei dal punto di vista comunitario: Israele come Stato per gli ebrei nel 1917, ben prima della seconda guerra mondiale; il Grande Libano come Stato dei cristiani maroniti nel 1920, dopo le proto-esperienze coloniali ottocentesche del Qaimaqamato (1843) e del Mutasarrifato (Mutassarrifiya,1860).  

La Siria francese (1920-1946), troppo vasta e composita per essere pensata come un unico contenitore etnico o confessionale, fu inizialmente divisa da Parigi in quattro diverse Sirie, due delle quali esplicitamente connotate a livello comunitario: la Siria dei drusi a sud, e la Siria degli alauiti sulla costa mediterranea. L’esercito ausiliario filofrancese (“le truppe del Levante”) in Siria era composto in larga parte dalle cosiddette minoranze delle zone rurali. E questo per contrastare la borghesia sunnita di Damasco e di Aleppo, che assieme a quella libanese di Tripoli si opponeva al progetto coloniale transalpino. 

Ma la logica del divide et impera macinava ormai da tempo i suoi grani. Lasciando sul tavolo la nera polvere intrisa del sangue dei massacri confessionali (il primo nel 1860, sul Monte Libano e a Damasco). 

Le violenze degli scorsi mesi – novelli massacri confessionali – proprio a Suwayda, nel Sud “druso” (dal 13 luglio 2025), e nella costa “alauita” (dai primi di marzo 2025) sono, almeno in parte, il frutto malevolo dell’articolato processo politico cominciato circa 200 anni fa e proseguito a ritmi serrati dai primi anni del Novecento: far sì che gli individui del Mediterraneo orientale si identifichino sempre di più con una comunità etnico-confessionale. Che non siano cittadini, ma membri comunitari sottomessi alle logiche della lottizzazione etnico-religiosa a beneficio di élite nazionali clienti di forze esterne.',
6120,
12,
1);

insert into autori (nome) values ('Fatto Quotidiano');
insert into autori (nome) values ('Francesco Maria Chelli');
insert into autori (nome) values ('Francesca Rossi'), ('Andrea Bianchi'), ('Laura Verdi');
INSERT INTO autori (nome) VALUES
('Marco Gatti'),
('Silvia Leone'),
('Pietro Neri');
insert into autori (nome) values ('Lucrezia Martini');
insert into autori (nome) values ('Lorenzo Tombetta');

/* GESTIONE TABELLE*/ 

show tables;
show create table pagine;
show create table autori;
show create table argomenti;
show create table articoli;

describe articoli;

select * from pagine;	
select * from autori;
select * from argomenti;
select * from articoli;

select concat(nome,', Id: ',id) autore_senza_articoli
from autori
where id not in(
select id_autore
from articoli);

select a.nome,(
select count(ar.id)
from articoli ar
where ar.id_autore = a.id) numero_articoli
from autori a
order by numero_articoli desc, a.nome asc;

select sum(lunghezza) battute_totali
from articoli;

update pagine set nome = 'index' where nome = 'homepage';
alter table articoli add column data_inserimento timestamp default current_timestamp;

alter table articoli modify column titolo varchar(100) not null;

UPDATE articoli SET data_inserimento = '2025-09-25 09:00:00' WHERE id = 1;
UPDATE articoli SET data_inserimento = '2025-09-26 14:30:00' WHERE id = 3;
UPDATE articoli SET data_inserimento = '2025-09-27 11:15:00' WHERE id = 5;
UPDATE articoli SET data_inserimento = '2025-09-28 16:45:00' WHERE id = 6;
UPDATE articoli SET data_inserimento = '2025-09-29 10:20:00' WHERE id = 8;
UPDATE articoli SET data_inserimento = '2025-09-30 13:10:00' WHERE id = 10;
UPDATE articoli SET data_inserimento = '2025-10-01 15:30:00' WHERE id = 12;
UPDATE articoli SET data_inserimento = '2025-10-02 08:45:00' WHERE id = 15;
UPDATE articoli SET data_inserimento = '2025-10-02 12:00:00' WHERE id = 16;
UPDATE articoli SET data_inserimento = '2025-10-02 17:25:00' WHERE id = 17;
UPDATE articoli SET data_inserimento = '2025-10-02 09:40:00' WHERE id = 18;

SELECT id, titolo, data_inserimento 
FROM articoli 
ORDER BY data_inserimento DESC;