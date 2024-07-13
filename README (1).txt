
Auction App

Ovaj repozitorijum sadrzi Auction App projekat, koji se sastoji iz dva dela: Laravel backend i React frontend.

Ova uputstva ce vam pomoci da postavite projekat na vasoj lokalnoj masini.

Preduslovi

Uverite se da imate instaliran sledeci softver na vasem racunaru:

- Node.js
- npm
- Composer
- PHP
- MySQL

Kloniranje Repozitorijuma

Klonirajte repozitorijum na vasu lokalnu masinu koristeci sledecu komandu:


git clone https://github.com/elab-development/internet-tehnologije-projekat-auctionapp_2020_0352/tree/master


Navigirajte do direktorijuma projekta:


cd AuctionApp

Backend (Laravel)

Postavljanje Backend-a

Navigirajte do `backend` direktorijuma:


cd auction-app


Instalacija Zavistnosti

Instalirajte potrebne PHP zavisnosti koristeci Composer:


composer install


Pokretanje Migracija

Pokrenite migracije baze podataka:


php artisan migrate

Pokretanje Aplikacije

Pokrenite Laravel razvojni server:

php artisan serve


Backend sada treba da radi na `http://localhost:3000`.

Frontend (React)

Postavljanje Frontend-a

Navigirajte do `frontend` direktorijuma:


cd auction-app-react


Instalacija Zavistnosti

Instalirajte potrebne npm zavisnosti:

npm install

Pokretanje Aplikacije

Pokrenite React razvojni server:

npm start

Frontend sada treba da radi na `http://localhost:3000`.

Funkcionalnosti Projekta

Auction App pruza sledece funkcionalnosti:

- Korisnicka Autentifikacija: Korisnici mogu da se registruju i prijave u aplikaciju.
- Aukcijski Oglasi: Korisnici mogu kreirati i pregledati aukcijske oglase.
- Liciti: Korisnici mogu postavljati ponude na aukcije.
- Korisnicki Profili: Korisnici mogu pregledati i uredjivati svoje profile i podatke o svojim aukcijama i kupovinama.
