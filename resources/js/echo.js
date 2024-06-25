import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

 
const options = {
    broadcaster: 'pusher',
    key: 'f9de0c0b80b3a77b1f6f',
    cluster: 'eu',
    forceTLS: true
}
 
window.Echo = new Echo({
    ...options,
    client: new Pusher(options.key, options)
});