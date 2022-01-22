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
    <div id="app"
         class="ui">
        <h1>GitHub Profile</h1>
        <github-user-card username="cedricdd"></github-user-card>
    </div>
</main>

<script type="text/x-template" id="github-user-card-template">
    <!-- Template for GitHub card -->
    <div class="ui card">
        <div class="image">
            <img :src="user.avatar_url">
        </div>
        <div class="content">
            <a :href="`https://github.com/${username}`" class="header">{{ user.login }}</a>
            <div class="meta">
                <span class="date">Joined in {{ user.created_at }}</span>
            </div>
            <div class="description">
                {{ user.bio ?? "Empty Bio" }}
            </div>
        </div>
        <div class="extra content">
            <a>
                <i class="user icon"></i>
                {{ user.followers }} Followers
            </a>
        </div>
    </div>
</script>

<!-- Import Vue.js and axios -->
<script src="https://unpkg.com/vue@3"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<!-- Your JavaScript Code :) -->
<script>
    Vue.createApp({}).component('github-user-card', {
        template: '#github-user-card-template',
        props: {
            username: {
                type: String,
                required: true,
            }
        },
        data() {
            return {
                user: {},
            }
        },
        async created() {
            console.log(this.username);
            const response = await axios.get("https://api.github.com/users/" + this.username);
            this.user = response.data;
        },
    }).mount('#app')
</script>
</body>

</html>
