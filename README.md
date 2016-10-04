# osticket-logger
## Remote-Logging plugin for osTicket
osticket-logger is a simple plugin that uses CURL to POST ticket details to an endpoint that is configured to ingest a JSON array.

### Known Bugs
`$ticket->getTopic()->getName()` returns nil.
`$ticket->getLastMessage()` returns nil.
`$ticket->getSubject()` returns nil.