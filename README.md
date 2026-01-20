# Gestione Appuntamenti Online  
Applicazione web per la gestione di appuntamenti online (studi medici, consulenze, centri servizi).  
Include autenticazione, CRUD completo, gestione asincrona degli stati e autorizzazioni utente.

---

## Panoramica
Questo progetto fornisce un sistema semplice e moderno per gestire appuntamenti attraverso un’interfaccia web.  
Gli utenti registrati possono creare, modificare, cancellare e aggiornare lo stato dei propri appuntamenti.  
Il frontend utilizza Blade e JavaScript, mentre il backend è realizzato con Laravel.

---

## Tecnologie Utilizzate

### Backend
- PHP 8+
- Laravel
- MySQL / MariaDB

### Frontend
- HTML5 / CSS3
- JavaScript (ES6)
- Blade Templates
- Fetch API (o Axios)

---

## Funzionalità Principali

### 1. Autenticazione Utenti
- Registrazione e login
- Logout
- Accesso protetto tramite middleware `auth`
- Sistema fornito tramite Laravel Breeze (o Jetstream)

### 2. CRUD Appuntamenti
Ogni appuntamento contiene:
- id  
- titolo  
- descrizione  
- data  
- ora  
- stato (prenotato, completato, annullato)  
- user_id (relazione con utente autenticato)

Azioni disponibili:
- Creazione
- Modifica
- Eliminazione
- Aggiornamento stato
- Validazione lato server (Laravel Request)
- Validazione lato client (JS)

### 3. Interazione Asincrona (AJAX)
Funzionalità dinamiche senza ricaricare la pagina:
- Eliminazione tramite `fetch`
- Cambio stato tramite dropdown
- Aggiornamento immediato della UI

Esempio:
```javascript
fetch(`/appointments/${id}`, {
    method: 'DELETE',
    headers: { 'X-CSRF-TOKEN': csrfToken }
})
.then(res => res.json())
.then(() => {
    document.getElementById(`row-${id}`).remove();
});
```

### 4. Autorizzazioni
- Solo il proprietario può modificare o eliminare l’appuntamento
- Implementazione tramite **Laravel Policies**

---

## Installazione

### 1. Clonare il progetto
```
git clone https://github.com/tuo-utente/nome-repo.git
cd nome-repo
```

### 2. Installare le dipendenze PHP
```
composer install
```

### 3. Configurazione ambiente
```
cp .env.example .env
php artisan key:generate
```
Configurare DB nel file `.env`.

### 4. Eseguire migrazioni
```
php artisan migrate
```

### 5. Installare dipendenze frontend
```
npm install
npm run dev
```

### 6. Avviare il server di sviluppo
```
php artisan serve
```

---

## Funzionalità Extra (Opzionali)
- Filtri per data o stato
- Calendario mensile in JavaScript
- Notifiche email per nuovi appuntamenti

---

## Requisiti
- PHP >= 8.1
- MySQL / MariaDB
- Composer
- Node.js + NPM

---

## Licenza
Rilasciato sotto licenza MIT.


