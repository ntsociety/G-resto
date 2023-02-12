@component('mail::message')
# Introduction

Dtech Resto vous remerci pour votre inscription sur notre site de réservation de nourritures.

@component('mail::button', ['url' => '/'])
Cliquer ICI
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
