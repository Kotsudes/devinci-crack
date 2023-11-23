# Devinci Cracks - Web Attacks

## Description

This repository was made for an academic project in the context of a engineering
degree in specialization [Cloud Computing & Cybersecurity](https://www.esilv.fr/en/programmes/master-degree-engineering/majors/cybersecurity-cloud-computing/) at [Pôle Léonard de Vinci](https://www.esilv.fr/en/).

The goal was to simulate web vulnerabilities, exploit them and fix them.

## How to use the attacks

### XSS (Cross-Site Scripting)

TODO: Polish details

We go on the XSS tab and click on "Go to unsecure" to go on the vulnerable version of the website, then in the form type `<scipt>alert("XSS attack!")</script>` and click on "Send" to see the alert pop up.

### Session Hijacking

This attack is hard to simulate because it requires either direct access to the target computer or if the attack is done remotely through user side script, we would need to host the server online.

For the physical access, the way to secure this is to prevent session fixation by changing the session id after the user logs in. This way, if the attacker tries to use the session id he got before the user logged in, it will be invalid.

For the remote access, we strengthen the validation logic for the session id. In secure mode, we generate a random token at login and store it both in the _session_ and in a _HttpOnly cookie_ (Https would also be a way to prevent this attack but it is not implemented in this project).
Moreover, we add another layer of security by checking the user agent and IP of the request to make sure it is the same as the one that logged in. If it is not, we invalidate the session.

TODO: Polish details

We connect with the following, hardcoded credentials: `admin:password` and we get a session id. We can copy this `session_id` and change the action=secure to action=hijack_page&session_id=SESSION_ID_HERE to get access to page that should belong to the admin.

> 🔧 **Example on the same browser on unsecure mode**
>
> 1. We login with admin:password and get the session_id `704dr47i820bmo7a2u3856374a`.
> 2. We then change the URL from `https://localhost/devinci-cracks/routeur.php?controller=hijacking&action=secure&secure=true` to `https://localhost/devinci-cracks/routeur.php?controller=hijacking&action=hijack_page&secure=true&session_id=704dr47i820bmo7a2u3856374a` and we get access to the admin page.

> 🔧 **Example on two browsers on unsecure mode**
>
> 1. We open two browsers, browser A (Edge) and browser B (Firefox).
> 2. We login with admin:password on browser A and get the session_id `704dr47i820bmo7a2u3856374a`.
> 3. We then change the URL from `https://localhost/devinci-cracks/routeur.php?controller=hijacking&action=secure&secure=false` to `https://localhost/devinci-cracks/routeur.php?controller=hijacking&action=hijack_page&secure=false&session_id=704dr47i820bmo7a2u3856374a` on browser B and we get access to the admin page.
>
> _NOTE: in secure mode, it wouldn't work because the session_id would be different and thus invalid._
