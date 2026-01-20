Gestione Appuntamenti Online (Laravel + PHP + JavaScript)
Realizzare una web application per la gestione di appuntamenti online (es. studio medico, consulenze, centro servizi) con:


Backend in Laravel (PHP)


Frontend con JavaScript


CRUD completo


Autenticazione utenti


Interazione asincrona 



---- Tecnologie richieste


PHP 


Laravel 


MySQL


HTML5 / CSS3


JavaScript (ES6)


Fetch API (o Axios) solo se si hanno conoscenze.



----- Funzionalità richieste
1. Autenticazione
Usare il sistema di autenticazione Laravel 


Registrazione utente


Login / Logout


Solo utenti autenticati possono gestire gli appuntamenti



---- Gestione Appuntamenti (CRUD)
Ogni Appuntamento contiene:
Campo 				Tipo 
id     				integer
titolo  				string
descrizione   			text
data                            date	 
ora								  time
stato							  enum (prenotato, completato, annullato)
user_id							  foreign 
keycreated_at						  mestamp

3.  Backend (Laravel)
Model
php artisan make:model Appointment -m

Controller
php artisan make:controller AppointmentController --resource

Metodi richiesti:


index()


create()


store()


edit()


update()


destroy()



4. Rotte (web.php)

imposta le rotte


5.  Frontend (Blade + JS)
Vista elenco appuntamenti


Tabella con:


Titolo


Data


Ora


Stato


Azioni (Modifica / Elimina)




Inserimento appuntamento


Form con validazione lato server


Validazione lato client (JavaScript)



6. JavaScript (AJAX)
Usare Fetch API per:

Eliminare un appuntamento senza ricaricare la pagina

Cambiare lo stato dell’appuntamento (dropdown)


Esempio:
fetch(`/appointments/${id}`, {
    method: 'DELETE',
    headers: {
        'X-CSRF-TOKEN': csrfToken
    }
})
.then(response => response.json())
.then(data => {
    // rimuove la riga dalla tabella
});


7. Validazione
Laravel (Request Validation)


titolo: obbligatorio, min 3 caratteri


data: non nel passato


ora: obbligatoria



8. Autorizzazione


Un utente può modificare/eliminare solo i propri appuntamenti


Usare Policy Laravel


----------- Funzionalità EXTRA

Filtro appuntamenti per data o stato

Calendario mensile (JS)

Invio email di conferma

Responsive design



