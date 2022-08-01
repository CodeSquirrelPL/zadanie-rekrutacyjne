const polishGreetings = {
    
    calculateAge(birthYear) {
        return new Date().getFullYear() - birthYear;
    },

    president() {
        return 'Witaj, prezesie!';
    },

    raise(username) {
        return `${username}, szykuj się na podwyżkę!`;
    },

    usersAge(username, age) {
        return `Witaj, ${username}! W tym roku kończysz ${age} lat!`;
    },

    fired (username) {
        return `${username}, jesteś zwolniony!`;
    },

    welcomeUsers(users) {
        users.forEach(element => {
            var greeting = '';
            if (element.salary>15000) 
            console.log(this.president(element.username));
            else if (element.salary<5000)
            console.log(this.raise(element.username));
            else greeting = element.birthYear%2 ? 
            console.log(this.fired(element.username)) : 
            console.log(this.usersAge(element.username, calculateAge(element.birthYear)));
        });
    },
}


var usersArr = [
    {username: 'Jan Kowalski', birthYear: 1983, salary: 4200},
    {username: 'Anna Nowak', birthYear: 1994, salary: 7500},
    {username: 'Jakub Jakubowski', birthYear: 1985, salary: 18000},
    {username: 'Piotr Kozak', birthYear: 2000, salary: 4999},
    {username: 'Marek Sinica', birthYear: 1989, salary: 7200},
    {username: 'Kamila Wiśniewska', birthYear: 1972, salary: 6800},
    ];

/*
Funkcja powinna przyjmować wspomnianą strukturę i dla każdego elementu tablicy wypisywać do konsoli programistycznej łańcuch znaków zależny od danych danego obiektu: 
• Dla osób z pensją powyżej 15 000: Witaj, prezesie! 
• Dla osób z pensją poniżej 5 000: <nazwa_użytkownika>, szykuj się na podwyżkę! 
• Dla osób z parzystym rokiem urodzenia: Witaj, <nazwa_użytkownika>! W tym roku kończysz <obliczony_wiek_rocznikowy> lat!
• Dla osób z nieparzystym rokiem urodzenia: <nazwa_użytkownika>, jesteś zwolniony!

Jan Kowalski, szykuj się na podwyżkę!
Witaj, Anna Nowak! W tym roku kończysz 28 lat!
Witaj, prezesie!
Piotr Kozak, szykuj się na podwyżkę!
Marek Sinica, jesteś zwolniony!
Witaj, Kamila Wiśniewska! W tym roku kończysz 50 lat!

Warunki na wysokość pensji mają być sprawdzane przed warunkami na rok urodzenia. obliczony_wiek_rocznikowy to różnica pomiędzy bieżącym rokiem, a rokiem urodzenia. */