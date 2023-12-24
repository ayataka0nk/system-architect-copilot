import axios from 'axios'

axios.interceptors.request.use((config) => {
  config.headers['Content-Type'] = 'application/json'
  config.headers['Accept'] = 'application/json'
  config.headers['X-CSRF-TOKEN'] = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute('content')
  return config
})
