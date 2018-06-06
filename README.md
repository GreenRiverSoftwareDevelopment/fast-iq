# fast-iq
Software Development Capstone Project


The Definition of Done 
-The code has been commented and meets code standards.
-The code is checked in to the repository.
-Everyone agrees the code is ready to move to our “finished stage”.
-When the product owner says the functionality meets the criteria for the product.
-All testing via manual and automation should be completed.
-Security measures should be completed.


Inception Deck
https://docs.google.com/presentation/d/1RkgnaoxpyDwtRGHKEvTLPOpVuyUxmuPF0-2yXaOfFTw/edit?usp=sharing

# Software Transition Plan

### General
The goal of Fast-IQ was to bring information from numerous binders into a virtual format so that information could be easily accessible without much back and forth physical action. This website is very general and can be used to create a dynamic learning environment for any type of subject e.g.(Biology, Accounting, Computer Science).

### Database
Currently, some entries from the database will be in array format and will be delimited by ",". Also, the delete function will actually delete entries from the database permanently. 
- If something is deleted high in the hierarchy (Categories -> Units -> Exercises -> Exercise Summary) for example a Unit is deleted, everything underneath will still stay in the database.
- You will have to create a new config file to work with your web host's database.

### Videos
YouTube links could potentially be a issue, the parsing of the YouTube URL is important. If a issue with videos arises check the route that handles the parsing of the videos urls.
