# osticket-logger
## Remote-Logging plugin for osTicket
osticket-logger is a simple plugin that uses CURL to POST ticket details to an endpoint that is configured to ingest a JSON array.

## Production State: 
Master: [![Build Status](https://travis-ci.org/jaketyo/osticket-logger.svg?branch=master)](https://travis-ci.org/jaketyo/osticket-logger)
Develop: [![Build Status](https://travis-ci.org/jaketyo/osticket-logger.svg?branch=develop)](https://travis-ci.org/jaketyo/osticket-logger)
#### NOT PRODUCTION READY! See 'Known Bugs'.

## osTicket Version
This plugin was last tested on v1.10-rc.3.

### Known Bugs (osTicket v1.10-rc.3)
`$ticket->getTopic()->getName()` returns nil.
`$ticket->getLastMessage()` returns nil.
`$ticket->getSubject()` returns nil.
