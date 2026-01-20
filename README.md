# Gestione Appuntamenti Online  
Applicazione web per la gestione di appuntamenti online (studio medico, consulenze, centri servizi).  
Include autenticazione utente, CRUD completo e interazione asincrona tramite JavaScript.

---

## Tecnologie Utilizzate

### Backend
- PHP 8+
- Laravel
- MySQL (MariaDB compatibile)

### Frontend
- HTML5 / CSS3
- JavaScript (ES6)
- Fetch API (o Axios)
- Blade Templates (Laravel)

---

## Funzionalità Principali

### 1. Autenticazione
- Registrazione utente
- Login / Logout
- Accesso protetto alle funzionalità
- Middleware Laravel `auth`

### 2. Gestione Appuntamenti (CRUD)
Ogni appuntamento contiene:
- **id**  
- **titolo**  
- **descrizione**  
- **data**  
- **ora**  
- **stato** (prenotato, completato, annullato)  
- **user_id** (relazione con utente autenticato)

Funzionalità:
- Creazione, modifica, eliminazione appuntamenti
- Validazione lato server (Request Validation)
- Validazione lato client (JavaScript)

### 3. Interazione Asincrona (AJAX)
- Eliminazione appuntamenti senza ricaricare la pagina
- Cambio stato dinamico con dropdown
- Aggiornamento vista tramite Fetch API

Esempio:
```javascript
fetch(`/appointments/${id}`, {
    method: 'DELETE',
    headers: {
        'X-CSRF-TOKEN': csrfToken
    }
})
.then(res => res.json())
.then(data => {
    // aggiorna l’interfaccia
});
```

### 4. Autorizzazioni
- Un utente può modificare/eliminare **solo i propri appuntamenti**
- Implementazione tramite **Laravel Policies**

---

## Funzionalità Extra (Opzionali)
- Filtri per data o stato
- Calendario mensile in JavaScript
- Invio email di conferma appuntamento

---

## Installazione

```
git clone https://github.com/utente/nome-repo.git
cd nome-repo
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install && npm run dev
php artisan serve
```

---

## Requisiti
- PHP 8 o superiore
- Composer
- MySQL/MariaDB
- Node.js + NPM

---

## Licenza
Questo progetto è distribuito con licenza MIT.

Responsive design
