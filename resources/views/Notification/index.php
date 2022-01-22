<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <title>Shopping List App</title>
    <style>
        html, body {
            width: 100%; height: 100%;
        }
    </style>
</head>

<body>

<main style="display: flex; justify-content: center; align-items: center; height: 100%;">
    <div id="app" class="ui">
        <h1>Notification Center</h1>
        <notification-message header="Default Type">
            Go to the <b>special offers</b> page to see now.
        </notification-message>
        <notification-message header="Warning Type" type="warning">
            <template #sub-info>
                Test
            </template>

            Go to the <b>special offers</b> page to see now.
        </notification-message>
        <notification-message header="Error Type" type="error">
            Go to the <b>special offers</b> page to see now.
        </notification-message>
        <notification-message header="Success Type" type="success">
            Go to the <b>special offers</b> page to see now.
        </notification-message>
    </div>
</main>

<script type="text/x-template" id="notification-message-template">
    <!-- Notification Message Markup -->
    <!-- Types: info, warning, error, success -->
    <div :class="ui message" :class="type" v-if="visible">
        <i class="close icon" @click="closeNotification"></i>
        <div class="header">
            {{ header }}
        </div>
        <p>
            <slot>Empty Notification</slot>
        </p>
        <p>
            <slot name="sub-info"></slot>
        </p>
    </div>
</script>

<!-- Import Vue.js -->
<script src="https://unpkg.com/vue@3"></script>

<!-- Your JavaScript Code :) -->
<script>
    Vue.createApp({}).component('notification-message', {
        template: '#notification-message-template',
        props: {
            type: {
                type: String,
                default: 'info',
            },
            header : {
                type: String,
                default: 'Information',
            }
        },
        data() {
          return {
              'visible': true
          }
        },
        methods: {
            closeNotification() {
                this.visible = false;
            }
        },
    }).mount('#app')
</script>
</body>

</html>
