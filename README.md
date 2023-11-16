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

For the remote access, the way to secure this is to use HTTPS instead of HTTP. This way, the session id will be encrypted and the attacker won't be able to read it. Also, ensuring the IP address and `user agent` of the user doesn't change during the session will prevent session hijacking.

TODO: Polish details

We connect with the following, hardcoded credentials: `admin:password` and we get a session cookie. We can copy this session_id and change the action=secure to action=hijack_page&session_id=SESSION_ID_HERE to get access to page that should belong to the admin.

> Example:
>
> 1. We login with admin:password and get the session_id `704dr47i820bmo7a2u3856374a`.
>
> 2. We then change the URL from `https://localhost/devinci-cracks/routeur.php?controller=hijacking&action=secure&secure=true` to `https://localhost/devinci-cracks/routeur.php?controller=hijacking&action=hijack_page&secure=true&session_id=704dr47i820bmo7a2u3856374a` and we get access to the admin page.
