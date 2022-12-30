
const form = document.querySelector('#contact-form');

form.addEventListener('submit', (evt) => {

    evt.preventDefault();

    // Get the form information
    const formData = new FormData(form);
    const name = formData.get('first-name-input')
    const email = formData.get('email-input')
    const message = formData.get('message-textarea')



    // id toast: messageSendedToast

    $.post(
        'assets/php/sendMessage.php',
        {
            name: name,
            email: email,
            message: message
        }).done(
            (data) => {
                console.log(JSON.parse(data))
                const toast = new bootstrap.Toast(document.getElementById('messageSendedToast'))
                console.log(toast)
                toast.show()
            }).fail(
                (data) => {
                    console.log(JSON.parse(data))
                }

            )

}
)
