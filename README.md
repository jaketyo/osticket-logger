# osticket-logger
## Remote-Logging plugin for osTicket
osticket-logger is a simple plugin that uses CURL to POST ticket details to an endpoint that is configured to ingest a JSON array.

# NOT PRODUCTION READY

## osTicket Version
This plugin was last tested on v1.10-rc.3.

### Known Bugs (v1.10-rc.3)
`$ticket->getTopic()->getName()` returns nil.
`$ticket->getLastMessage()` returns nil.
`$ticket->getSubject()` returns nil.