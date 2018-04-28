window.Vue = require('vue');

var app = new Vue({
    el: '#app',
    data:{
        title: 'Get you Go',
        subtitle: 'We serve best service in Hang Kong',
        categories:[
            { 
                name: 'Technology',
                image: 'https://bulma.io/images/placeholders/1280x960.png',
                description: 'Some Description for your Technology category'
            },
            {
                name: 'Accounting',
                image: 'https://bulma.io/images/placeholders/1280x960.png',
                description: `Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                                <a href="#">#css</a> <a href="#">#responsive</a>`
            },
            {
                name: 'Maketing Consultant',
                image: 'https://bulma.io/images/placeholders/1280x960.png',
                description: `Lorem ipsum dolor sit amet,`
            },
            {
                name: 'Maketing Consultant',
                image: 'https://bulma.io/images/placeholders/1280x960.png',
                description: `Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris.`
            }
        ]
    }
});