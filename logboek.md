# Logboek

Mijn gedachten hierin gewoon losjes genoteerd. Tijdsindicatie er soms achteraan toegevoegd. Indien er nog vragen zijn; contactgegevens voeg ik toe in de mail aan Bert. 

1. Casus goed lezen.

2. Bij de eerste keer lezen herken ik dat opdracht 1 een FizzBuzz-achtige opdracht is. Deze moet vrij snel te doen zijn. Misschien de Tom Scott (of Computerphile?) video waar ik hierover geleerd heb, nog even kijken?

3. Opdracht 2 lijkt voort te borduren op opdracht 1, met een extra recursief probleem erin. Deze lijkt ook niet al te moeilijk, maar wel even de details goed lezen en achteraf in een sandbox checken of de output juist lijkt. De hint is een goede verduidelijking. Note to self: niet vergeten af te ronden. Gezien het beperkte aantal inwoners waarmee we werken, lijkt leesbaarheid belangrijker dan performance o.i.d.

4. Opdracht 3 lijkt me al iets wat misschien intern gebruikt zou kunnen worden, maar waar veel code dan is aangepast of weggehaald. Dit is gelijk wat ingewikkelder, omdat een begrip van de structuur en het doel van iedere class eerst wel belangrijk is. Ben misschien een beetje paranoïde dat hier ergens al een bug is ingevoegd.  
   Nevermind, zie dat mijn wantrouwen gerechtvaardigd was; de "+" voor de concatenation gebruiken zal vast niet per ongeluk door een verdwaalde JS-developer zijn geschreven.

5. Opdracht 4 is de meest open vraag naar mijn idee. Er staan drie zinnen in:
   1. "De code die de gemeente gebruikt is onbetrouwbaar en kwalitatief niet erg hoogwaardig."
   2. "Een spelfout in de naam van de partij kan al voor problemen zorgen."
   3. "De gemeente heeft jou gevraagd om in +/- 20 regels te beschrijven wat er verbeterd kan worden aan deze code."

   Regel 1 insinueert dat er meerdere dingen mis zijn. Regel 2 refereert juist heel specifiek naar een spellingsprobleem. Regel 3 is juist weer heel breed. Ik ga er daarom van uit dat regel 2 meer een hint is naar een mogelijk voorbeeld van waarom deze code onbetrouwbaar en kwalitatief niet erg hoogwaardig zou kunnen zijn.  
   Aangezien stemmen aan de orde is, lijkt het me dat nauwkeurigheid en fraudegevoeligheid een van de belangrijkste prioriteiten zijn.

6. Opdracht nogmaals helemaal doorlezen. (5 min)

7. Opdracht door ChatGPT gooien en vragen wat het denkt dat de aandachtspunten zijn en of ik nog iets mis. Hetzelfde met de vier classes gedaan, gevraagd wat de bedoelde samenhang is van de componenten en of er nog bugs in zitten.  
   Hoop dat jullie dit niet zien als valsspelen. Zag niet in de opdracht staan dat dit niet mocht, maar wil in dit logboek wel gewoon open en eerlijk zijn over mijn werkwijze. Persoonlijk ben ik namelijk van mening dat dit een gereedschap is dat op een werkdag veel meerwaarde heeft. Ben het de laatste tijd in ieder geval veel gaan gebruiken, en zal alles wat ik aan code schrijf er ook doorheen halen en vragen hoe het beter kan, voordat ik het commit.
(10 min)

8. GitHub-branch opzetten. (10 min)

9. Opdracht 1 was vrij weinig werk, vooral dingen dubbelchecken of het werkte en of ik geen fouten maakte. En niet vergeten om "$i" bij 1 te laten beginnen. (10 min)

10. Voor opdracht 2 geldt hetzelfde. Nog even bepalen wat voor loop hier handig is en niet vergeten om de `$extraLetters` op te tellen bij `$newLetters`. Ook de non-respondersberekening nog even dubbelchecken. (15 min)

11. Opdracht 3 duurt wat langer. Allereerst is het begrijpen wat het idee achter de verschillende classes is en hoe het met deze opzet zou moeten werken. Daarnaast ben je automatisch al een beetje aan het nadenken over opdracht 4. Allereerst maar wat werkend gemaakt en ondertussen een lijstje van punten voor opdracht 4 geschreven. (45 min minimaal)

12. Nog wat variabelen standaardwaarden gegeven.

13. Een simpele test geschreven om de code te kunnen uittesten. ChatGPT gebruikt voor de mock-data. De meeste tijd zat hier in het uitzoeken hoe je PHP-code makkelijk uitvoert in VS Code, heb dit al een tijdje niet buiten een browseromgeving hoeven doen. (15 min)

14. Tot slot `calculateResult` nog opgedeeld in meerdere functies voor wat leesbaarheid. (5 min)

15. **Opdracht 4:**  
    Aangezien ik hier ondertussen toch al aan het typen was, kan ik mijn gedachten en aanbevelingen net zo goed hier plaatsen.  
    Wat ik allereerst dacht, is dat het in principe een slecht idee is om digitaal te stemmen. Het gaat echter om bitterballen, en met alle respect naar B. Urger en Mora, deze stemming maakt relatief niet zo heel veel uit. In het kader van een gedachtenexperiment is het daarom misschien ook wel leuk om een betrouwbaar en kwalitatief hoogwaardig bitterballen-stemprogramma te bedenken.  

    Allereerst lijkt het mij verstandiger om arrays van `Votes` bij te houden in plaats van `int $votesFor` en `int $votesAgainst`. Zo kun je stemmen van individuele raadsleden ook weergeven, maar nog veel belangrijker: checken of ze misschien meermaals gestemd hebben. Geen idee of dit al de bedoeling was in opdracht 3, maar volgens mij gebeurt dit nog nergens namelijk.  

    Wat betreft de spellingsfouten van de partijnamen: het handmatig invullen van partijnamen en deze als key gebruiken, vind ik al een slecht idee. Het zou, lijkt mij, veel beter zijn om gebruik te maken van aparte `Vote`, `Voter/Councilor`, en `Party`-classes. Zodat je gewoon een multiselect kan gebruiken met beschikbare partijen/stemmers.  
    Als het, om de een of andere reden, wel moet in deze structuur, heb ik denk ik de simpelste en meest effectieve manier om fouten te herkennen al geïmplementeerd, namelijk het printen van `$resultsByParty`.  
    Daarnaast dacht ik zelf ook gelijk aan iets Fuse.js-achtigs met een voorgedefinieerde lijst of enums van `$validPartyNames`. Had hier zelf geen ervaring mee met PHP, maar een collega gaf me vervolgens de tip om gebruik te maken van Levenshtein distance (iets als `levenshtein($inputName, $validName)` waarbij je itereert over `$validPartyNames`).  

    Overige punten die me opvielen:
    - De naamgeving van variabelen is voor verbetering vatbaar (`$amount{...}` bijv.).
    - Veel variabelen hebben geen standaardwaarden.
    - Er is geen error handling.
  
    Tot slot viel het me op dat het op dit moment niet mogelijk is om je te onthouden van de stemming. 

(bij elkaar opgeteld ongeveer 1 uur gok ik)

16. Tot slot heb ik aan dit document gewerkt, en weet wel zeker dat hier het meeste tijd in heeft gezeten.
