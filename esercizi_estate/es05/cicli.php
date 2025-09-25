<?php

// DAL BASSO VERSO L'ALTO
foreach ($flaminiSRL['ceo']['dipendenti']['manager']['dipendenti']['direttrice vendite']['dipendenti'] as $k => $v) {
    echo $v['nome'] . '<br>';
}
echo "Sono subordinati di " . $flaminiSRL['ceo']['dipendenti']['manager']['dipendenti']['direttrice vendite']['nome'] . '<br><br>';

foreach ($flaminiSRL['ceo']['dipendenti']['manager']['dipendenti']['direttrice marketing']['dipendenti'] as $k => $v) {
    echo $v['nome'] . '<br>';
}
echo "Sono subordinati di " . $flaminiSRL['ceo']['dipendenti']['manager']['dipendenti']['direttrice marketing']['nome'] . '<br><br>';

foreach ($flaminiSRL['ceo']['dipendenti']['manager']['dipendenti'] as $k => $v) {
    echo $v['nome'] . '<br>';
}
echo "Sono subordinati di " . $flaminiSRL['ceo']['dipendenti']['manager']['nome'] . '<br><br>';

foreach ($flaminiSRL['ceo']['dipendenti'] as $k => $v) {
    echo $v['nome'] . '<br>';
}
echo "È subordinato di " . $flaminiSRL['ceo']['nome'] . '<br><br>';

if (isset($_POST['nome']) && strcasecmp($_POST['nome'], $francescaFlamini) == 0) {
    foreach ($flaminiSRL as $k => $v) {
        echo $v['nome'] . '<br>';
    }
    echo "È il CEO di " . "Flamini SRL" . '<br><br>';
}

// DALL'ALTO VERSO IL BASSO
foreach ($flaminiSRL as $k => $v) {
    foreach ($v['dipendenti'] as $k2 => $v2) {
        echo $v2['nome'] . '<br>';
        if (isset($v2['dipendenti'])) {
            // isset è necessario perché nel mio array non tutte le persone hanno la chiave 'dipendenti'
            foreach ($v2['dipendenti'] as $k3 => $v3) {
                echo $v3['nome'] . '<br>';
                if (isset($v3['dipendenti'])) {
                    foreach ($v3['dipendenti'] as $k4 => $v4) {
                        echo $v4['nome'] . '<br>';
                    }
                }
            }
        }
    }
};
