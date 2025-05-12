export default function viewTicketList() {
    /**
     * Handles the display of tickets by adding click event listeners to each ticket.
     * When a ticket is clicked, it hides the detailed content of the previously displayed ticket
     * and shows the detailed content of the selected ticket.
     *
     * @returns {void}
     */
    let tickets = document.getElementsByClassName('ticket');
    let currentTicket = tickets[0];
    for (let ticket of tickets) {
        ticket.addEventListener('click', function () {
            currentTicket.lastElementChild.classList.add('hide');
            currentTicket = ticket;
            ticket.lastElementChild.classList.remove('hide');
        })
    }
}