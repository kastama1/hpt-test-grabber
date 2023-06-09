### ZADÁNÍ

- Udělej fork tohoto repozitáře (https://github.com/hptroniccz/hpt-test-grabber).
- Následující dva úkoly proveď postupně jako jednotlivé commity.
- Použij kód kompatibilní s PHP 8.1.

1. Naprogramuj aplikaci pro zjištění ceny produktu na CZC.cz. Vstup může být jeden nebo více kódů výrobce zboží.
    1. Vstupní bod aplikace je soubor [run.php](run.php) a spuštění metody run() instance
       třídy [Dispatcher](src/Dispatcher.php).
    1. Vstupní data jsou v plaintext formě v souboru [input.txt](input.txt) (co řádek, to položka).
    1. Výstup na stdout ve formátu JSON (viz [sample.json](docs/sample.json)).

   ![zadání 1](docs/img1.jpg)

2. Rozšiř aplikaci z bodu 1, aby získávala i název produktu a jeho procentuální hodnocení. Odpovídajícím způsobem rozšiř
   výstupní data.

   ![zadání 2](docs/img2.jpg)

### Instalace a spuštění

- composer install
- php run.php
