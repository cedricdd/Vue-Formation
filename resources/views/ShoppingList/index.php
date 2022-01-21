<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping List App</title>
    <style>
        html, body {
            width: 100%; height: 100%;
        }
        .checked {
            text-decoration:line-through;
        }
        .underline {
            text-decoration: underline;
        }
        .priority {
            font-weight: 700;
        }
    </style>
</head>
<body>
    <main style="height: 100%; display: flex; justify-content: center; align-items: center;">
        <div id="shopping-list">
            <div style="text-align: center; margin-bottom: 25px;">
                <h1>{{ header || "Welcome" }}</h1>
                <button v-if="editing" @click="edit(false)">Cancel</button>
                <button v-else @click="edit(true)">Add Item</button>
            </div>
            <div class="add-item-form" v-if="editing">
                <input type="text" v-model.trim="newItem" placehodler="Add a new Item" @keyup.enter="pushItem" style="width: 100%;" />
                <!--<p>{{ characterCounter }}/200</p>-->
                <label>
                    <input type="checkbox" v-model="newItemHighPriority" />
                    High Priority
                </label>
                <button type="submit" class="btn btn-primary" @click="pushItem"
                 v-bind:disabled="newItem.length === 0">Save Item</button>
            </div>
            <!--<a v-bind:href="newItem">Dynamic Link</a>-->
            <p v-if="items.length === 0">Nice job! Everything has been bought</p>
            <!--
           <p>
               <strong>Priority:</strong>
               <label><input type="radio" value="high" v-model="newItemPriority" />High</label>
               <label><input type="radio" value="low" v-model="newItemPriority" />Low</label>

               <label>
                   Priority:
                   <select v-model="newItemPriority">
                       <option value="high">High</option>
                       <option value="low">Low</option>
                   </select>
               </label>
            </p>
            {{ newItem }} | {{ newItemHighPriority }}
            <br/><br/>
            <label><input v-model="iceCreamFlavors" type="checkbox" value="vanilla">Vanilla</label>
            <label><input v-model="iceCreamFlavors" type="checkbox" value="chocolate">Chocolate</label>
            <label><input v-model="iceCreamFlavors" type="checkbox" value="strawberry">Strawberry</label>
            <label><input v-model="iceCreamFlavors" type="checkbox" value="cookie-cream">Cookie & Cream</label>
            -->
            <ul>
                <li v-for="(item, index) in reversedItems" :key="item.id"
                    @click="togglePurchase(item)"
                    v-bind:class="[
                        item.purchased ? 'checked' : 'underline',
                        item.highPriority ? 'priority' : '',
                    ]">{{ item.label }}</li>
            </ul>
        </div>
    </main>
    <script src="https://unpkg.com/vue@3"></script>
    <script>
        Vue.createApp({
            data() {
                return {
                    header: "Shopping List App!",
                    editing: false,
                    newItem: '',
                    //newItemPriority: 'low',
                    newItemHighPriority: false,
                    //iceCreamFlavors: [],
                    items: [
                        {id: 1, label: 'item 1', purchased: true, highPriority: true},
                        {id: 2, label: 'item 2', purchased: true, highPriority: false},
                        {id: 3, label: 'item 3', purchased: false, highPriority: true},
                        {id: 4, label: 'item 4', purchased: false, highPriority: false},
                    ],
                }
            },

            computed: {
                characterCounter() {
                    return this.newItem.length;
                },
                reversedItems() {
                    return [...this.items].reverse();
                }
            },

            methods: {
                pushItem() {
                    const id = this.items.length + 1;
                    this.items.push({id, label: this.newItem, highPriority: this.newItemHighPriority});
                    this.newItem = '';
                    this.newItemHighPriority = false;
                },
                edit(editing) {
                    this.editing = editing;
                    this.newItem = '';
                    this.newItemHighPriority = false;
                },
                togglePurchase(item) {
                    item.purchased ^= 1;
                },
            }
        })
        .mount("#shopping-list");
    </script>
</body>
</html>
