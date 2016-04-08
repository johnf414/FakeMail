# Fake-Mail
Send email to anyone, from anyone

Steps.

1: Make sure the emailform.php is in the same directory as the index.html
2: Launch index.html in a browser.
3: enter correct details.
4: See hosted version at http://johnfernandez.net/fakemail


PLEASE NOTE:

Code must be hosted, will not work from local machine.

All emails are logged to the file "emailLog.txt", to disable logging, comment out all the "fwrite", "fopen", "fclose", and "$txt" tags towards the bottom of the email script.

Index.html is just a recommended form format,

if you would like to create your own form, make sure the tags:

- email
- digest
- sendtomail
- subject

Are submitted to the form
