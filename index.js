var usersArr = [
    {username: 'Jan Kowalski', birthYear: 1983, salary: 4200},
    {username: 'Anna Nowak', birthYear: 1994, salary: 7500},
    {username: 'Jakub Jakubowski', birthYear: 1985, salary: 18000},
    {username: 'Piotr Kozak', birthYear: 2000, salary: 4999},
    {username: 'Marek Sinica', birthYear: 1989, salary: 7200},
    {username: 'Kamila Wiśniewska', birthYear: 1972, salary: 6800},
    ];

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
            if (element.salary>15000) {
                console.log(this.president(element.username));
            } else if (element.salary<5000) {
                console.log(this.raise(element.username));
            } else {
                greeting = element.birthYear % 2
                ? console.log(this.fired(element.username))
                : console.log(this.usersAge(element.username, this.calculateAge(element.birthYear)));
            }
        });
    }
}

polishGreetings.welcomeUsers(usersArr);