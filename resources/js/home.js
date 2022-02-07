import axios from "axios";

const form = document.querySelector('.form')
const formSuccess = document.querySelector('.form__success')

form.addEventListener('submit', async e => {
    e.preventDefault()
    formSuccess.classList.remove('form__success_active')
    document.querySelectorAll('.form__error').forEach(span => {
        span.innerHTML = ''
    })

    try {
        const formData = new FormData(e.target)

        const {data} = await axios.post('/api/store', formData)

        formSuccess.classList.add('form__success_active')
        formSuccess.querySelector('a').innerHTML = data
        formSuccess.querySelector('a').href = data
    } catch ({response}) {
        if (response.status === 422) {
            Object.entries(response.data.errors).forEach(([name, value]) => {
                document.querySelector(`.form__error[data-input="${name}"]`).innerHTML = value
            })
        }

        response.status === 500 && alert('Серверная ошибка')
    }
})